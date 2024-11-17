let limitLeft, limitRight;

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
                    resultText += `\\( \\lim_{{${variable} \\to ${value}^-}} ${func} = ${limitLeft} \\)<br><br>`;
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

    // Tampilkan hasil
    document.getElementById("result").innerHTML = resultText;
    MathJax.typesetPromise(); // Render MathJax

    // Plot grafik semua fungsi
    if (functions.length > 0) {
        plotFunctions(functions, variable, value);
    }
}

function plotFunctions(functions, variable, limitValue) {
    try {
        const datasets = [];
        const range = 10; // Rentang x

        functions.forEach((func, index) => {
            const xValues = [];
            const yValues = [];
            let limitYValue = null;
            for (let x = limitValue - range; x <= limitValue + range; x += 0.1) {
                xValues.push(x);
                try {
                    const y = nerdamer(func, { [variable]: x }).evaluate().text();
                    yValues.push(parseFloat(y));
                    if (x.toFixed(1) == limitValue.toFixed(1)) {
                        limitYValue = parseFloat(y);
                    }
                } catch {
                    yValues.push(null); // Jika terdapat nilai tak hingga
                }
            }

            datasets.push({
                label: `Grafik ${func}`,
                data: xValues.map((x, i) => ({ x, y: yValues[i] })),
                borderColor: `hsl(${index * 60}, 100%, 50%)`, // Warna berbeda untuk setiap grafik
                borderWidth: 1,
                fill: false,
                pointRadius: xValues.map(x => x.toFixed(1) == limitValue.toFixed(1) ? 5 : 0),
                pointBackgroundColor: xValues.map(x => x.toFixed(1) == limitValue.toFixed(1) ? 'red' : 'transparent')
            });
        });

        // Render grafik menggunakan Chart.js
        const ctx = document.getElementById('chart').getContext('2d');
        if (window.chartInstance) {
            window.chartInstance.destroy();
        }

        window.chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({ length: (range * 2) / 0.1 + 1 }, (_, i) => (limitValue - range + i * 0.1).toFixed(1)),
                datasets: datasets
            },
            options: {
                scales: {
                    x: { title: { display: true, text: 'Nilai x' } },
                    y: { title: { display: true, text: 'Nilai f(x)' } }
                },
                plugins: {
                    zoom: {
                        zoom: {
                            enabled: true,
                            mode: 'xy',
                            speed: 0.1
                        },
                        pan: {
                            enabled: true,
                            mode: 'xy',
                            speed: 0.1
                        }
                    },
                    annotation: {
                        annotations: {
                            line1: {
                                type: 'line',
                                xMin: limitValue,
                                xMax: limitValue,
                                borderColor: 'red',
                                borderWidth: 2,
                                label: {
                                    content: `x = ${limitValue}`,
                                    enabled: true,
                                    position: 'top'
                                }
                            }
                        }
                    }
                }
            }
        });
    } catch (error) {
        console.error("Kesalahan dalam plotting grafik:", error);
    }
}
