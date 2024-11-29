let limitLeft, limitRight;

document.addEventListener('DOMContentLoaded', function() {
    const directionSelect = document.getElementById('direction');
    const secondInput = document.querySelectorAll(".function")[1];
    const secondLabel = document.querySelectorAll(".functionInput label")[1];

    directionSelect.addEventListener('change', function() {
        secondInput.style.display = this.value === 'both' ? 'block' : 'none';
        secondLabel.style.display = this.value === 'both' ? 'block' : 'none';
    });
});

function calculateLimit() {
    const functionInputs = document.querySelectorAll(".function");
    const variable = document.getElementById("variable").value.trim();
    const value = parseFloat(document.getElementById("value").value);
    const direction = document.getElementById("direction").value;

    if (!variable || isNaN(value)) {
        document.getElementById("result").innerText = "Input tidak valid. Pastikan semua bidang telah diisi dengan benar.";
        return;
    }

    let resultText = "";
    const functions = [];

    if (direction === "regular") {
        const func = functionInputs[0].value.trim();
        if (!func) {
            resultText = "Fungsi tidak valid. Pastikan fungsi telah diisi dengan benar.";
        } else {
            try {
                const limitResult = nerdamer(`limit(${func}, ${variable}, ${value})`).text();
                resultText = `\\( \\lim_{{${variable} \\to ${value}}} ${func} = ${limitResult} \\)`;
            } catch (error) {
                console.error("Kesalahan dalam perhitungan limit:", error);
                resultText = "Kesalahan dalam perhitungan fungsi. Periksa kembali input Anda.";
            }
        }
    } else {
        functionInputs.forEach((input, index) => {
            const func = input.value.trim();
            if (!func) {
                resultText += `Fungsi ${index + 1} tidak valid. Pastikan semua bidang telah diisi dengan benar.<br>`;
                return;
            }

            functions.push(func);

            try {
                if (direction === "both") {
                    if(index === 0){
                        limitLeft = nerdamer(`limit(${func}, ${variable}, ${value}, -1)`).text();
                        resultText += `\\( \\lim_{{${variable} \\to ${value}^-}} ${func} = ${limitLeft} \\)<br>`;
                    }else{
                        limitRight = nerdamer(`limit(${func}, ${variable}, ${value}, 1)`).text();
                        resultText += `\\( \\lim_{{${variable} \\to ${value}^+}} ${func} = ${limitRight} \\)<br>`;

                        if(limitLeft === limitRight){
                            resultText += `Limit kiri dan kanan Sama, jadi fungsi tersebut memiliki limit<br>`;
                        }else{
                            resultText += `Limit kiri dan kanan Tidak Sama, jadi fungsi tersebut tidak memiliki limit<br>`;
                        }
                    }
                } else if (direction === "left") {
                    limitLeft = nerdamer(`limit(${func}, ${variable}, ${value}, -1)`).text();
                    resultText += `\\( \\lim_{{${variable} \\to ${value}^-}} ${func} = ${limitLeft} \\)<br>`;
                } else if (direction === "right") {
                    limitRight = nerdamer(`limit(${func}, ${variable}, ${value}, 1)`).text();
                    resultText += `\\( \\lim_{{${variable} \\to ${value}^+}} ${func} = ${limitRight} \\)<br>`;
                } else {
                    resultText += "Arah limit tidak valid. Pilih 'both', 'left', atau 'right'.<br>";
                }
            } catch (error) {
                console.error("Kesalahan dalam perhitungan limit:", error);
                resultText += `Kesalahan dalam perhitungan fungsi ${index + 1}. Periksa kembali input Anda.<br>`;
            }
        });
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}


function calculateTrigonometricLimit() {
    const func = document.getElementById("functionTrigonometric").value.trim();
    const variable = document.getElementById("variableTrigonometric").value.trim();
    const value = parseFloat(document.getElementById("valueTrigonometric").value);

    if (!variable || isNaN(value) || !func) {
        document.getElementById("result").innerText = "Input tidak valid. Pastikan semua bidang telah diisi dengan benar.";
        return;
    }

    let resultText = "";

    try {
        const limitResult = nerdamer(`limit(${func}, ${variable}, ${value})`).text();
        resultText += `\\( \\lim_{{${variable} \\to ${value}}} ${func} = ${limitResult} \\)<br>`;
    } catch (error) {
        console.error("Kesalahan dalam perhitungan limit:", error);
        resultText += `Kesalahan dalam perhitungan fungsi. Periksa kembali input Anda.<br>`;
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}
function calculateInfinityLimit() {
    const functionInputs = document.querySelectorAll(".functionInfinity");
    const variable = document.getElementById("variableInfinity").value.trim();
    const direction = document.getElementById("directionInfinity").value;

    if (!variable || !functionInputs[0].value.trim()) {
        document.getElementById("result").innerText = "Input tidak valid. Pastikan semua bidang telah diisi dengan benar.";
        return;
    }

    const func = functionInputs[0].value.trim();
    let resultText = "";

    try {
        // Evaluasi limit menggunakan metode numerik
        const limitResult = evaluateLimit(func, variable, direction);
        resultText = `\\( \\lim_{{${variable} \\to ${direction === "infinity" ? "\\infty" : (direction === "-infinity" ? "-\\infty" : direction)}}} ${func} = ${limitResult} \\)`;
    } catch (error) {
        console.error("Kesalahan dalam perhitungan limit:", error);
        resultText = "Kesalahan dalam perhitungan fungsi. Periksa kembali input Anda.";
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}

function evaluateLimit(func, variable, direction) {
    const math = window.math; // Pastikan library math.js sudah di-load
    let point;

    // Tentukan titik arah
    if (direction === "infinity") {
        point = 1e10; // Angka besar untuk mendekati tak hingga positif
    } else if (direction === "-infinity") {
        point = -1e10; // Angka kecil untuk mendekati tak hingga negatif
    } else {
        point = parseFloat(direction); // Angka spesifik (untuk limit biasa)
        if (isNaN(point)) throw new Error("Arah limit tidak valid.");
    }

    // Fungsi substitusi variabel
    const substitutedFunc = func.replace(new RegExp(variable, "g"), `(${point})`);

    // Evaluasi hasil
    const result = math.evaluate(substitutedFunc);

    if (result === Infinity) return "\\infty";
    if (result === -Infinity) return "-\\infty";

    return result.toFixed(4); // Bulatkan ke 4 desimal
}



