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
    const valueInput = document.getElementById("value").value.trim();
    const direction = document.getElementById("direction").value;

    if (!variable || !valueInput) {
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
                const limitResult = nerdamer(`limit(${func}, ${variable}, ${valueInput})`).text();
                resultText = `\\[ \\lim_{${variable} \\to ${valueInput}} ${nerdamer(func).toTeX()} = ${nerdamer(limitResult).toTeX()} \\]`;
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
                    if(index === 0) {
                        limitLeft = nerdamer(`limit(${func}, ${variable}, ${valueInput}, -1)`).text();
                        resultText += `\\[ \\lim_{${variable} \\to ${valueInput}^-} ${nerdamer(func).toTeX()} = ${nerdamer(limitLeft).toTeX()} \\]`;
                    } else {
                        limitRight = nerdamer(`limit(${func}, ${variable}, ${valueInput}, 1)`).text();
                        resultText += `\\[ \\lim_{${variable} \\to ${valueInput}^+} ${nerdamer(func).toTeX()} = ${nerdamer(limitRight).toTeX()} \\]`;

                        if(limitLeft === limitRight) {
                            resultText += `<div class="alert alert-success mt-3">Limit kiri dan kanan sama, jadi fungsi tersebut memiliki limit</div>`;
                        } else {
                            resultText += `<div class="alert alert-warning mt-3">Limit kiri dan kanan tidak sama, jadi fungsi tersebut tidak memiliki limit</div>`;
                        }
                    }
                } else if (direction === "left") {
                    limitLeft = nerdamer(`limit(${func}, ${variable}, ${valueInput}, -1)`).text();
                    resultText += `\\[ \\lim_{${variable} \\to ${valueInput}^-} ${nerdamer(func).toTeX()} = ${nerdamer(limitLeft).toTeX()} \\]`;
                } else if (direction === "right") {
                    limitRight = nerdamer(`limit(${func}, ${variable}, ${valueInput}, 1)`).text();
                    resultText += `\\[ \\lim_{${variable} \\to ${valueInput}^+} ${nerdamer(func).toTeX()} = ${nerdamer(limitRight).toTeX()} \\]`;
                }
            } catch (error) {
                console.error("Kesalahan dalam perhitungan limit:", error);
                resultText += `<div class="alert alert-danger">Kesalahan dalam perhitungan fungsi ${index + 1}. Periksa kembali input Anda.</div>`;
            }
        });
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}

function calculateTrigonometricLimit() {
    const func = document.getElementById("functionTrigonometric").value.trim();
    const variable = document.getElementById("variableTrigonometric").value.trim();
    const valueInput = document.getElementById("valueTrigonometric").value.trim();

    if (!variable || !valueInput || !func) {
        document.getElementById("result").innerText = "Input tidak valid. Pastikan semua bidang telah diisi dengan benar.";
        return;
    }

    let resultText = "";
    try {
        const limitResult = nerdamer(`limit(${func}, ${variable}, ${valueInput})`).text();
        resultText = `\\[ \\lim_{${variable} \\to ${valueInput}} ${nerdamer(func).toTeX()} = ${nerdamer(limitResult).toTeX()} \\]`;
    } catch (error) {
        console.error("Kesalahan dalam perhitungan limit:", error);
        resultText = `<div class="alert alert-danger">Kesalahan dalam perhitungan fungsi. Periksa kembali input Anda.</div>`;
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}

function calculateInfinityLimit() {
    const functionInputs = document.querySelectorAll(".functionInfinity");
    let resultText = "";

    try {
        // Evaluasi limit menggunakan metode manual
        const limitResult = evaluateLimit(func, variable, direction === "infinity" ? Infinity : -Infinity);
        resultText = `\\( \\lim_{{${variable} \\to ${direction === "infinity" ? "\\infty" : "-\\infty"}}} ${func} = ${limitResult} \\)`;
    } catch (error) {
        console.error("Kesalahan dalam perhitungan limit:", error);
        resultText = "Kesalahan dalam perhitungan fungsi. Periksa kembali input Anda.";
    }

    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise();
}

function evaluateLimit(func, variable, direction) {
    // Pisahkan fungsi menjadi array dari suku-suku, misalnya x^2 + 3*x - 2
    const terms = func.split(/\s*\+\s*|\s*-\s*/);
    let result = 0;

    for (let term of terms) {
        term = term.trim();
        const sign = func.includes(`-${term}`) ? -1 : 1; // Deteksi tanda positif/negatif

        // Evaluasi setiap suku
        const parsedTerm = term.replace(new RegExp(variable, "g"), `(${direction})`);

        try {
            const termResult = math.evaluate(parsedTerm) * sign;

            // Jika hasil suku adalah Infinity atau -Infinity, prioritaskan hasil akhir
            if (termResult === Infinity || termResult === -Infinity) {
                result = termResult;
                break;
            }

            result += termResult;
        } catch (error) {
            console.error("Kesalahan dalam evaluasi suku:", term, error);
            throw error;
        }
    }

    // Jika hasilnya Infinity atau -Infinity, berikan simbol yang benar
    if (result === Infinity) return "\\infty";
    if (result === -Infinity) return "-\\infty";

    return result;
}


