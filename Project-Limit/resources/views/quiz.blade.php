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
                                        <div class="btn-group mb-3" role="group">
                                            <button class="btn btn-outline-primary active" id="js-btn">JavaScript</button>
                                            <button class="btn btn-outline-primary" id="py-btn">Python</button>
                                        </div>
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
                                <p>Nilaimu: <span id="score"></span>%</p>
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
                    question: 'Hitunglah limit berikut: \\[\\lim_{x \\to 0} (2x + 3)\\]',
                    options: ['1', '2', '3', '4'],
                    correct: 2,
                    explanation: 'Sederhanakan: \\[\\frac{2x^2 + 3x}{x} = 2x + 3\\]. Substitusi \\(x = 0\\): \\(2(0) + 3 = 3\\).'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to -2} \\frac{x^2 + 4x + 4}{x + 2} \\]',
                    options: ['0', '1', '2', '3'],
                    correct: 0,
                    explanation: 'Bentuknya \\(0/0\\), faktorkan: \\[\\frac{x^2 + 4x + 4}{x + 2} = \\frac{(x + 2)(x + 2)}{x + 2}\\]. Coret \\(x + 2\\), maka: \\[\\lim_{x \\to -2} x + 2 = -2 + 2 = 0\\].'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0}\\frac{\\sin x}{x} \\]',
                    options: ['0', '1', '2', '3'],
                    correct: 1,
                    explanation: 'Rumus standar: \\[\\lim_{x \\to 0} \\frac{\\sin x}{x} = 1\\].'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0}\\frac{\\tan x}{x} \\]',
                    options: ['0', '1', '2', '3'],
                    correct: 1,
                    explanation: 'Rumus standar: \\[\\lim_{x \\to 0} \\frac{\\tan x}{x} = 1\\].'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0}\\frac{\\sin(3x)}{x} \\]',
                    options: ['1', '2', '3', '4'],
                    correct: 2,
                    explanation: 'Atur: \\[\\frac{\\sin(3x)}{x} = \\frac{\\sin(3x)}{3x} \\cdot 3\\]. \\(\\lim_{x \\to 0} \\frac{\\sin(3x)}{3x} = 1\\), sehingga hasilnya \\(3\\).'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to 0} x \\sin\\left(\\frac{1}{x}\\right) \\]',
                    options: ['0', '1', '2', '3'],
                    correct: 0,
                    explanation: 'Karena \\(\\sin\\) selalu berada di \\([-1, 1]\\), maka: \\[-x \\leq x\\sin\\left(\\frac{1}{x}\\right) \\leq x\\]. Dengan teorema pemeras, \\(\\lim_{x \\to 0} x \\sin\\left(\\frac{1}{x}\\right) = 0\\).'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to \\pi/2} (\\sin x + \\cos x) \\]',
                    options: ['0', '1', '2', '3'],
                    correct: 1,
                    explanation: 'Substitusi \\(x = \\pi/2\\): \\[\\sin\\left(\\frac{\\pi}{2}\\right) + \\cos\\left(\\frac{\\pi}{2}\\right) = 1 + 0 = 1\\].'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to \\infty}\\frac{3x^2 + 5}{x^2 + 1} \\]',
                    options: ['1', '2', '3', '4'],
                    correct: 2,
                    explanation: 'Bagi semua suku dengan \\(x^2\\): \\[\\lim_{x \\to \\infty} \\frac{3x^2 + 5}{x^2 + 1} = \\frac{3 + \\frac{5}{x^2}}{1 + \\frac{1}{x^2}} \\to \\frac{3 + 0}{1 + 0} = 3\\].'
                },
                {
                    type: 'multiple-choice',
                    question: '\\[ \\lim_{x \\to \\infty}\\frac{x^3 + x}{2x^3 + 3x} \\]',
                    options: ['1', '1/2', '2', '3'],
                    correct: 1,
                    explanation: 'Bagi semua suku dengan \\(x^3\\): \\[\\lim_{x \\to \\infty} \\frac{x^3 + x}{2x^3 + 3x} = \\frac{1 + \\frac{1}{x^2}}{2 + \\frac{3}{x^2}} \\to \\frac{1 + 0}{2 + 0} = \\frac{1}{2}\\].'
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
    // 1. Sederhanakan ekspresi: (x^3 + 1)/(x + 1)
    // 2. Faktorkan pembilang
    // 3. Kembalikan nilai limit setelah menyederhanakan
    return // your answer here
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
                const jsBtn = document.getElementById('js-btn');
                const pyBtn = document.getElementById('py-btn');

                document.getElementById('question-text').innerHTML = question.question;

                // Toggle display between code editor and multiple choice based on question type
                if (question.type === 'programming') {
                    codeSection.style.display = 'block';
                    optionsContainer.innerHTML = '';

                    if (question.language === 'python') {
                        jsEditor.style.display = 'none';
                        pyEditor.style.display = 'block';
                        jsBtn.classList.remove('active');
                        pyBtn.classList.add('active');
                        document.getElementById('py-code-input').value = userCode[currentQuestion] || question.initialCode;
                    } else {
                        jsEditor.style.display = 'block';
                        pyEditor.style.display = 'none';
                        jsBtn.classList.add('active');
                        pyBtn.classList.remove('active');
                        document.getElementById('code-input').value = userCode[currentQuestion] || question.initialCode;
                    }

                    document.getElementById('output').value = userOutputs[currentQuestion];
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
                // Save the code
                userCode[currentQuestion] = code;
                let output = '';

                // Create custom console.log
                const originalConsole = console.log;
                console.log = (...args) => {
                    output = args.join(' ');
                };

                try {
                    eval(code);
                    console.log = originalConsole;
                    // Save the output
                    userOutputs[currentQuestion] = output;
                    document.getElementById('output').value = output;

                    // Extract the actual result from the output string
                    const result = output.split(': ')[1];
                    userAnswers[currentQuestion] = result === questions[currentQuestion].expectedOutput;
                    questionsCompleted[currentQuestion] = true; // Mark programming question as completed
                    displayQuestion();
                } catch (error) {
                    console.log = originalConsole;
                    userOutputs[currentQuestion] = `Error: ${error.message}`;
                    document.getElementById('output').value = userOutputs[currentQuestion];
                }
            };

            document.getElementById('run-py-code').onclick = async () => {
                if (!pyodide) {
                    try {
                        await initPyodide();
                        // Add SymPy setup code
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
                    // Clear previous output
                    document.getElementById('output').value = "Running...";

                    // Create a custom stdout to capture print statements
                    let output = '';
                    pyodide.globals.set('__stdout__', {
                        write: (text) => {
                            output += text;
                        }
                    });

                    // Modify the code to capture stdout
                    const wrappedCode = `
import sys
sys.stdout = __stdout__
${code}
`;

                    // Run the Python code
                    await pyodide.loadPackagesFromImports(wrappedCode);
                    const result = await pyodide.runPythonAsync(wrappedCode);

                    // Get final output, combining both print statements and return value
                    const finalOutput = output || (result ? result.toString() : '');

                    // Update the output display
                    userOutputs[currentQuestion] = finalOutput.trim();
                    document.getElementById('output').value = userOutputs[currentQuestion];

                    // Compare with expected output (consider floating point precision)
                    const expectedValue = parseFloat(questions[currentQuestion].expectedOutput);
                    const actualValue = parseFloat(finalOutput);
                    userAnswers[currentQuestion] = Math.abs(expectedValue - actualValue) < 1e-6;
                    questionsCompleted[currentQuestion] = true;

                    displayQuestion();
                } catch (error) {
                    userOutputs[currentQuestion] = `Error: ${error.message}`;
                    document.getElementById('output').value = userOutputs[currentQuestion];
                }
            };

            function selectAnswer(index) {
                userAnswers[currentQuestion] = index;
                questionsCompleted[currentQuestion] = true;
                displayQuestion();
            }

            function calculateScore() {
                const correct = userAnswers.reduce((sum, answer, index) => {
                    if (questions[index].type === 'multiple-choice') {
                        return sum + (answer === questions[index].correct ? 1 : 0);
                    } else {
                        return sum + (answer === true ? 1 : 0);
                    }
                }, 0);
                return Math.round((correct / questions.length) * 100);
            }

            function showResults() {
                clearInterval(timerInterval);
                const quizContainer = document.getElementById('quiz-container');
                const resultsContainer = document.getElementById('results-container');
                const reviewContainer = document.getElementById('review-container');

                quizContainer.style.display = 'none';
                resultsContainer.style.display = 'block';

                document.getElementById('score').textContent = calculateScore();

                reviewContainer.innerHTML = questions.map((question, index) => {
                    if (question.type === 'multiple-choice') {
                        return `
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-2">${index + 1}. ${question.question}</p>
                                <p class="mb-2">Your answer: ${question.options[userAnswers[index]]}</p>
                                <p class="mb-2">Correct answer: ${question.options[question.correct]}</p>
                                <p class="mb-0">Explanation: ${question.explanation}</p>
                            </div>
                        </div>
                    `;
                    } else {
                        return `
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="mb-2">${index + 1}. ${question.question}</p>
                                <p class="mb-2">Status: ${userAnswers[index] ? 'Benar' : 'Salah'}</p>
                                <p class="mb-2">Expected Output: ${question.expectedOutput}</p>
                                <p class="mb-0">Explanation: ${question.explanation}</p>
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
