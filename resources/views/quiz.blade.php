<x-layout>
    <div class="container" style="padding-top: 80px;">
        <h1 class="my-5 text-center">Kuis Limit</h1>
        <!-- Add timer display at the top -->
        <div class="text-center mb-4">
            <div class="d-inline-block px-4 py-2 rounded bg-primary text-white">
                <h4 class="m-0">
                    Waktu Tersisa: <span id="timer" class="fw-bold"></span>
                </h4>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div id="quiz-container">
                                <div id="question-container" class="mb-4">
                                    <h4 id="question-text" class="mb-3"></h4>
                                    <div id="code-section" style="display: none">
                                        <div id="js-editor">
                                            <div class="form-group with-title mb-3">
                                                <textarea id="code-input" class="form-control" rows="10" placeholder="Tulis kode JavaScript di sini"></textarea>
                                                <label>JavaScript</label>
                                            </div>
                                            <button id="run-code" class="btn btn-dark mb-3">Jalankan Kode</button>
                                        </div>
                                        <div id="py-editor" style="display: none;">
                                            <div class="form-group with-title mb-3">
                                                <textarea id="py-code-input" class="form-control" rows="10" placeholder="Tulis kode Python di sini"></textarea>
                                                <label>Python</label>
                                            </div>
                                            <button id="run-py-code" class="btn btn-dark mb-3">Jalankan Kode</button>
                                        </div>
                                        <div class="form-group with-title">
                                            <textarea id="output" class="form-control" rows="3" disabled></textarea>
                                            <label>Output</label>
                                        </div>
                                    </div>
                                    <div id="options-container" class="d-grid gap-2">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button id="prev-btn" class="btn btn-secondary" disabled>Sebelumnya</button>
                                    <div class="flex-grow-1 text-center me-4">
                                        <span id="question-number" class="text-center"></span>
                                    </div>
                                    <button id="next-btn" class="btn btn-primary">Lanjut</button>
                                </div>
                            </div>
                            <div id="results-container" class="text-center" style="display: none;">
                                <h3>Hasil Kuis</h3>
                                <p>Nilaimu: <span id="score"></span></p>
                                <div id="review-container"></div>
                                <button id="restart-btn" class="btn btn-primary mt-3">Coba lagi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js"></script>
        <script>
            let pyodide = null;
            let pyodideLoading = null;

            async function initPyodide() {
                if (pyodideLoading) return pyodideLoading;
                if (pyodide) return pyodide;

                document.getElementById('output').value = "Loading Python Environment...";

                pyodideLoading = (async () => {
                    try {
                        pyodide = await loadPyodide();
                        await pyodide.loadPackage(["numpy", "sympy"]);
                        document.getElementById('output').value = "Python Environment Ready!";
                        console.log("Pyodide loaded successfully!");
                        return pyodide;
                    } catch (error) {
                        console.error("Failed to load Pyodide:", error);
                        document.getElementById('output').value = "Failed to load Python Environment!";
                        throw error;
                    }
                })();

                return pyodideLoading;
            }

            const allQuestions = [
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0}\\frac{2\\sin^{2}\\left(\\frac{x}{2}\\right)}{5x^{2}} \\]',
                    options: ['0', '1/5', '1/10', '2/5'],
                    correct: 2,
                    explanation: 'Gunakan sifat limit dan rumus dasar \\[\\lim_{x \\to 0}\\frac{\\sin x}{x} = 1\\]. Langkah penyelesaiannya dengan mengganti \\[\\frac{2\\sin(\\frac{x}{2})\\sin(\\frac{x}{2})}{5x \\cdot x}\\] menjadi \\[\\frac{2 \\cdot \\frac{1}{2} \\cdot \\frac{1}{2}}{5} = \\frac{1}{10}\\]'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0}\\frac{\\sin(x + 2)}{x^2 - 4} \\]',
                    options: ['-1/2', '1/2', '-2', '2'],
                    correct: 0,
                    explanation: 'Sederhanakan bentuk penyebut: \\[\\lim_{x \\to 0}\\frac{\\sin(x + 2)}{(x + 2)(x - 2)} = \\frac{1}{0 - 2} = -\\frac{1}{2}\\]. Di sini kita faktorkan x² - 4 menjadi (x+2)(x-2)'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to \\infty}\\frac{(3x - 2)^3}{(4x + 2)^3} \\]',
                    options: ['27/64', '3/4', '9/16', '1'],
                    correct: 0,
                    explanation: 'Untuk limit ke tak hingga, bandingkan pangkat tertinggi. Setelah mengembangkan dan membagi dengan x³: \\[\\frac{27x^3 - 54x^2 - 12x - 8}{64x^3 + 96x^2 + 48x + 8} = \\frac{27}{64}\\] karena suku-suku lain mendekati 0'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to \\infty}\\sqrt{x^2 - 2x} - x \\]',
                    options: ['0', '1', '-1', '∞'],
                    correct: 0,
                    explanation: 'Untuk menyelesaikan ini, kita sederhanakan: \\[\\frac{x}{x} - \\frac{2x^{\\frac{1}{2}}}{x} - \\frac{x}{x} = 1 - 0 - 1 = 0\\]'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 2}\\frac{2x^2 - x - 6}{3x^2 - 5x - 2} \\]',
                    options: ['1', '7/7', '2', '0'],
                    correct: 0,
                    explanation: 'Faktorkan pembilang dan penyebut: \\[\\lim_{x \\to 2}\\frac{(2x + 3)(x - 2)}{(3x + 1)(x - 2)} = \\frac{7}{7} = 1\\]. Faktor (x-2) bisa dicoret karena x→2'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 5}\\frac{x^2 - x - 20}{x - 5} \\]',
                    options: ['9', '10', '5', '8'],
                    correct: 0,
                    explanation: 'Faktorkan pembilang: \\[\\frac{(x + 4)(x - 5)}{x - 5} = x + 4\\]. Setelah mencoret (x-5), substitusi x = 5, sehingga: 5 + 4 = 9'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 3}\\frac{(x - 3)(\\sqrt{x} + \\sqrt{3})}{\\sqrt{x} - \\sqrt{3}} \\]',
                    options: ['12', '6', '9', '3'],
                    correct: 0,
                    explanation: 'Kalikan dengan sekawan \\[\\frac{(x - 3)(\\sqrt{x} + \\sqrt{3})}{\\sqrt{x} - \\sqrt{3}} \\cdot \\frac{\\sqrt{x} + \\sqrt{3}}{\\sqrt{x} + \\sqrt{3}}\\]. Setelah disederhanakan: \\[(2\\sqrt{3})(2\\sqrt{3}) = 12\\]'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to q}\\frac{x\\sqrt{x} - q\\sqrt{q}}{\\sqrt{x} - \\sqrt{q}} \\]',
                    options: ['3q', '2q', 'q', '4q'],
                    correct: 0,
                    explanation: 'Kalikan dengan sekawan dan sederhanakan: \\[\\lim_{x \\to q}\\frac{x\\sqrt{x} - q\\sqrt{q}}{\\sqrt{x} - \\sqrt{q}} \\cdot \\frac{\\sqrt{x} + \\sqrt{q}}{\\sqrt{x} + \\sqrt{q}}\\]. Setelah disederhanakan dan substitusi x = q, hasilnya adalah \\[2q + q = 3q\\]'
                },
                {
                    type: 'programming',
                    question: 'Buatlah fungsi JavaScript untuk menghitung limit berikut: \\[ \\lim_{x \\to 3} \\frac{x^2 - 9}{x - 3} \\]',
                    initialCode: `
function calculateLimit() {
    return
}
console.log(calculateLimit());`,
                    expectedOutput: '6',
                    explanation: 'Faktorkan pembilang: \\[ \\frac{x^2 - 9}{x - 3} = \\frac{(x - 3)(x + 3)}{x - 3} \\]. Setelah menyederhanakan, \\(x + 3\\), maka \\(\\lim_{x \\to 3} x + 3 = 6\\).'
                },
                {
                    type: 'programming',
                    question: 'Buatlah fungsi JavaScript untuk menghitung limit berikut: \\[ \\lim_{x \\to 2} \\frac{x^2 - 4}{x - 2} \\]',
                    initialCode: `
function calculateLimit() {
    return
}
console.log(calculateLimit());`,
                    expectedOutput: '4',
                    explanation: 'Faktorkan pembilang: \\[ \\frac{x^2 - 4}{x - 2} = \\frac{(x + 2)(x - 2)}{x - 2} \\]. Setelah menyederhanakan, \\(x + 2\\), maka \\(\\lim_{x \\to 2} x + 2 = 4\\).'
                },
                {
                    type: 'programming',
                    question: 'Buatlah fungsi JavaScript untuk menghitung limit berikut: \\[ \\lim_{x \\to -1} \\frac{x^3 + 1}{x + 1} \\]',
                    initialCode: `
function calculateLimit() {
    return
}
console.log(calculateLimit());
`,
                    expectedOutput: '-3',
                    explanation: 'Faktorkan pembilang: \\[ \\frac{x^3 + 1}{x + 1} = \\frac{(x + 1)(x^2 - x + 1)}{x + 1} \\]. Setelah menyederhanakan, substitusi x = -1 ke dalam x^2 - x + 1.'
                },
                {
                    type: 'programming',
                    language: 'python',
                    question: 'Buatlah fungsi Python untuk menghitung limit berikut menggunakan SymPy: \\[ \\lim_{x \\to 1} \\frac{x^3 - 1}{x - 1} \\]',
                    initialCode: `
from sympy import Symbol, limit
x = Symbol('x')

def calculate_limit():
    return

print(calculate_limit())`,
                    expectedOutput: '3',
                    explanation: 'Menggunakan SymPy untuk menghitung limit secara simbolik.'
                },
                {
                    type: 'programming',
                    language: 'python',
                    question: 'Buatlah fungsi Python untuk menghitung limit berikut menggunakan SymPy: \\[ \\lim_{x \\to 2} \\frac{x^3 - 8}{x - 2} \\]',
                    initialCode: `
from sympy import Symbol, limit
x = Symbol('x')

def calculate_limit():
    return

print(calculate_limit())`,
                    expectedOutput: '12',
                    explanation: 'Menggunakan SymPy untuk menghitung limit secara simbolik.'
                }
            ]


            function getRandomQuestions(n) {
                const shuffled = [...allQuestions].sort(() => 0.5 - Math.random());
                return shuffled.slice(0, n);
            }

            const questions = getRandomQuestions(5);

            let currentQuestion = 0;
            let userAnswers = new Array(questions.length).fill(null);
            let userCode = new Array(questions.length).fill('');
            let userOutputs = new Array(questions.length).fill('');
            let timeLeft = 8 * 60; // 8 minutes in seconds
            let timerInterval;
            let questionsCompleted = new Array(questions.length).fill(false);
            let outputs = new Array(questions.length).fill('');

            function startTimer() {
                timerInterval = setInterval(() => {
                    timeLeft--;
                    updateTimerDisplay();

                    if (timeLeft <= 0) {
                        clearInterval(timerInterval);
                        showResults();
                    }
                }, 1000);
            }

            function updateTimerDisplay() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                document.getElementById('timer').textContent =
                    `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }

            function displayQuestion() {
                const question = questions[currentQuestion];
                const codeSection = document.getElementById('code-section');
                const optionsContainer = document.getElementById('options-container');
                const jsEditor = document.getElementById('js-editor');
                const pyEditor = document.getElementById('py-editor');

                document.getElementById('question-text').innerHTML = question.question;

                if (question.type === 'programming') {
                    codeSection.style.display = 'block';
                    optionsContainer.innerHTML = '';

                    if (question.language === 'python') {
                        jsEditor.style.display = 'none';
                        pyEditor.style.display = 'block';
                        document.getElementById('py-code-input').value = userCode[currentQuestion] || question.initialCode;
                        document.getElementById('output').value = outputs[currentQuestion] || '';
                    } else {
                        jsEditor.style.display = 'block';
                        pyEditor.style.display = 'none';
                        document.getElementById('code-input').value = userCode[currentQuestion] || question.initialCode;
                        document.getElementById('output').value = outputs[currentQuestion] || '';
                    }
                } else {
                    codeSection.style.display = 'none';
                    optionsContainer.style.display = 'block';

                    optionsContainer.innerHTML = '';
                    question.options.forEach((option, index) => {
                        const button = document.createElement('button');
                        button.className =
                            `btn btn-outline-primary ${userAnswers[currentQuestion] === index ? 'active' : ''}`;
                        button.innerHTML = option;
                        button.onclick = () => selectAnswer(index);
                        optionsContainer.appendChild(button);
                    });
                }

                document.getElementById('question-number').textContent =
                    `Pertanyaan ${currentQuestion + 1} dari ${questions.length}`;

                document.getElementById('prev-btn').disabled = currentQuestion === 0;
                const nextBtn = document.getElementById('next-btn');
                const allCompleted = questionsCompleted.every(q => q);

                if (currentQuestion === questions.length - 1) {
                    nextBtn.innerHTML = 'Selesai';
                    nextBtn.disabled = !allCompleted;
                } else {
                    nextBtn.innerHTML = 'Selanjutnya';
                    nextBtn.disabled = false;
                }

                MathJax.typesetPromise();
            }

            document.getElementById('run-code').onclick = () => {
                const code = document.getElementById('code-input').value;
                userCode[currentQuestion] = code;
                let output = '';

                const originalConsole = console.log;
                console.log = (...args) => {
                    output = args.join(' ');
                };

                try {
                    eval(code);
                    console.log = originalConsole;

                    outputs[currentQuestion] = output; // Store output for current question
                    document.getElementById('output').value = output;

                    const result = output.split(': ')[1];
                    userAnswers[currentQuestion] = result === questions[currentQuestion].expectedOutput;
                    questionsCompleted[currentQuestion] = true;
                    displayQuestion();
                } catch (error) {
                    console.log = originalConsole;
                    outputs[currentQuestion] = `Error: ${error.message}`; // Store error for current question
                    document.getElementById('output').value = outputs[currentQuestion];
                }
            };

            document.getElementById('run-py-code').onclick = async () => {
                if (!pyodide) {
                    try {
                        await initPyodide();
                        await pyodide.runPythonAsync(`
                            import sympy
                            from sympy import Symbol, limit
                            x = Symbol('x')
                        `);
                    } catch (error) {
                        document.getElementById('output').value = "Error: Python environment not available. Please try again.";
                        return;
                    }
                }

                const code = document.getElementById('py-code-input').value;
                userCode[currentQuestion] = code;

                try {
                    document.getElementById('output').value = "Running...";

                    let output = '';
                    pyodide.globals.set('__stdout__', {
                        write: (text) => {
                            output += text;
                        }
                    });

                    const wrappedCode = `
import sys
sys.stdout = __stdout__
${code}
`;

                    await pyodide.loadPackagesFromImports(wrappedCode);
                    const result = await pyodide.runPythonAsync(wrappedCode);

                    const finalOutput = output || (result ? result.toString() : '');

                    outputs[currentQuestion] = finalOutput.trim(); // Store output for current question
                    document.getElementById('output').value = outputs[currentQuestion];

                    const expectedValue = parseFloat(questions[currentQuestion].expectedOutput);
                    const actualValue = parseFloat(finalOutput);
                    userAnswers[currentQuestion] = Math.abs(expectedValue - actualValue) < 1e-6;
                    questionsCompleted[currentQuestion] = true;

                    displayQuestion();
                } catch (error) {
                    outputs[currentQuestion] = `Error: ${error.message}`; // Store error for current question
                    document.getElementById('output').value = outputs[currentQuestion];
                }
            };

            function selectAnswer(index) {
                userAnswers[currentQuestion] = index;
                questionsCompleted[currentQuestion] = true;
                displayQuestion();
            }

            function calculateScore() {
                let correct = 0;
                questions.forEach((question, index) => {
                    if (question.type === 'multiple-choice') {
                        if (userAnswers[index] === question.correct) {
                            correct++;
                        }
                    } else {
                        // For programming questions, the answer was already validated
                        if (userAnswers[index] === true) {
                            correct++;
                        }
                    }
                });
                return Math.round((correct / questions.length) * 100);
            }

            function showResults() {
                clearInterval(timerInterval);
                const quizContainer = document.getElementById('quiz-container');
                const resultsContainer = document.getElementById('results-container');
                const reviewContainer = document.getElementById('review-container');
                const score = calculateScore();

                quizContainer.style.display = 'none';
                resultsContainer.style.display = 'block';

                let resultMessage = '';
                if (score >= 80) {
                    resultMessage = 'Selamat! Hasil yang sangat baik!';
                } else if (score >= 60) {
                    resultMessage = 'Cukup baik, terus berlatih!';
                } else {
                    resultMessage = 'Jangan menyerah, coba lagi!';
                }

                document.getElementById('score').innerHTML = `
                    <div class="mb-3">${score}</div>
                    <div class="h5">${resultMessage}</div>
                `;

                reviewContainer.innerHTML = questions.map((question, index) => {
                    if (question.type === 'multiple-choice') {
                        return `
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-2">${index + 1}. ${question.question}</p>
                                <p class="mb-2">Jawaban kamu: ${question.options[userAnswers[index]]}</p>
                                <p class="mb-2">Jawaban soal: ${question.options[question.correct]}</p>
                                <p class="mb-0">Penjelasan: ${question.explanation}</p>
                            </div>
                        </div>
                    `;
                    } else {
                        return `
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-2">${index + 1}. ${question.question}</p>
                                <p class="mb-2">Status: ${userAnswers[index] ? 'Benar' : 'Salah'}</p>
                                <p class="mb-2">Jawaban soal: ${question.expectedOutput}</p>
                                <p class="mb-0">Penjelasan: ${question.explanation}</p>
                            </div>
                        </div>
                    `;
                    }
                }).join('');

                MathJax.typesetPromise();
            }

            document.getElementById('prev-btn').onclick = () => {
                currentQuestion--;
                displayQuestion();
            };

            document.getElementById('next-btn').onclick = () => {
                if (currentQuestion === questions.length - 1) {
                    showResults();
                } else {
                    currentQuestion++;
                    displayQuestion();
                }
            };

            document.getElementById('restart-btn').onclick = () => {
                currentQuestion = 0;
                userAnswers.fill(null);
                userCode.fill(''); // Clear saved code
                userOutputs.fill(''); // Clear saved outputs
                questionsCompleted.fill(false);
                outputs.fill(''); // Clear all outputs
                timeLeft = 8 * 60;
                document.getElementById('quiz-container').style.display = 'block';
                document.getElementById('results-container').style.display = 'none';
                displayQuestion();
                startTimer();
            };

            // Initialize quiz
            document.addEventListener('DOMContentLoaded', function() {
                startTimer();
                displayQuestion();
            });
        </script>
    @endpush
</x-layout>
