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
    const variable = document.getElementById("variableInfinity").value.trim();
    const direction = document.getElementById("directionInfinity").value;

    // Validasi input
    if (!variable) {
        document.getElementById("result").innerHTML = "Input tidak valid. Pastikan variabel telah diisi.";
        return;
    }

    let resultText = "";

    functionInputs.forEach((input, index) => {
        let func = input.value.trim();

        // Validasi fungsi
        if (!func) {
            resultText += `Fungsi ${index + 1} tidak valid. Pastikan fungsi telah diisi.<br>`;
            return;
        }

        try {
            // Normalisasi input fungsi
            func = func.replace(/\s+/g, ''); // Menghapus spasi
            func = func.replace(/\^/g, '**'); // Mengubah ^ menjadi **

            // Analisis fungsi polinomial
            let terms = analyzePoly(func, variable);
            let highestDegree = getHighestDegree(terms);

            let limitResult;
            if (direction === "infinity") {
                limitResult = evaluatePolyLimit(terms, highestDegree, true);
                resultText += `\\( \\lim_{${variable} \\to \\infty} ${formatFunction(func)} = ${formatResult(limitResult)} \\)<br>`;
            } else if (direction === "negative_infinity") {
                limitResult = evaluatePolyLimit(terms, highestDegree, false);
                resultText += `\\( \\lim_{${variable} \\to -\\infty} ${formatFunction(func)} = ${formatResult(limitResult)} \\)<br>`;
            }
        } catch (error) {
            console.error("Error calculating limit:", error);
            resultText += `Error pada fungsi ${index + 1}. Periksa syntax fungsi Anda.<br>`;
        }
    });

    document.getElementById("result").innerHTML = resultText;
    // Refresh MathJax rendering
    if (typeof MathJax !== 'undefined') {
        MathJax.typesetPromise();
    }
}

// Fungsi untuk menganalisis polinomial
function analyzePoly(func, variable) {
    // Pisahkan terms dengan + atau -
    let terms = func.match(/[+-]?[^+-]+/g) || [];
    return terms.map(term => {
        let coefficient = 1;
        let degree = 0;

        // Extract coefficient and degree
        term = term.trim();
        if (term.includes(variable)) {
            let parts = term.split(variable);
            coefficient = parts[0] ? parseFloat(parts[0]) : 1;
            degree = parts[1] ? parseInt(parts[1].replace('**', '')) : 1;
        } else {
            coefficient = parseFloat(term);
        }

        return { coefficient, degree };
    });
}

// Fungsi untuk mendapatkan pangkat tertinggi
function getHighestDegree(terms) {
    return Math.max(...terms.map(term => term.degree));
}

// Fungsi untuk mengevaluasi limit polinomial
function evaluatePolyLimit(terms, highestDegree, isPositive) {
    if (highestDegree === 0) return terms[0].coefficient;

    let leadingTerm = terms.find(term => term.degree === highestDegree);
    if (!leadingTerm) return 0;

    if (highestDegree % 2 === 0) {
        return leadingTerm.coefficient > 0 ? Infinity : -Infinity;
    } else {
        if (isPositive) {
            return leadingTerm.coefficient > 0 ? Infinity : -Infinity;
        } else {
            return leadingTerm.coefficient > 0 ? -Infinity : Infinity;
        }
    }
}

// Fungsi untuk memformat fungsi ke tampilan yang lebih baik
function formatFunction(func) {
    return func.replace(/\*\*/g, '^').replace(/\*/g, '');
}

// Fungsi untuk memformat hasil
function formatResult(result) {
    if (result === Infinity) return "\\infty";
    if (result === -Infinity) return "-\\infty";
    return result;
}


