<x-layout>
    <div class="container" style="padding-top: 80px;">
        <h1 class="my-5 text-center">Quiz Limit</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div id="quiz-container">
                                <div id="question-container" class="mb-4">
                                    <h4 id="question-text" class="mb-3"></h4>
                                    <div id="options-container" class="d-grid gap-2">
                                        <!-- Options will be inserted here -->
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button id="prev-btn" class="btn btn-secondary" disabled>Previous</button>
                                    <div>
                                        <span id="question-number"></span>
                                    </div>
                                    <button id="next-btn" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                            <div id="results-container" class="text-center" style="display: none;">
                                <h3>Quiz Results</h3>
                                <p>Your score: <span id="score"></span>%</p>
                                <div id="review-container"></div>
                                <button id="restart-btn" class="btn btn-primary mt-3">Try Again</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const questions = [
            {
                question: '\\[ \\lim_{x \\to 2} \\frac{x^2 - 4}{x - 2} = ? \\]',
                options: ['2', '4', '0', '∞'],
                correct: 0,
                explanation: 'Menggunakan faktorisasi: \\[\\frac{x^2 - 4}{x - 2} = \\frac{(x+2)(x-2)}{x-2} = x + 2\\]'
            },
            {
                question: '\\[ \\lim_{x \\to \\infty} \\frac{2x^2 + 3x}{x^2 + 1} = ? \\]',
                options: ['0', '1', '2', '∞'],
                correct: 2,
                explanation: 'Bagi pembilang dan penyebut dengan pangkat tertinggi (x^2)'
            },
            {
                question: '\\[ \\lim_{x \\to 0} \\frac{\\sin x}{x} = ? \\]',
                options: ['0', '1', '∞', 'Tidak ada'],
                correct: 1,
                explanation: 'Ini adalah limit fundamental trigonometri'
            }
        ];

        let currentQuestion = 0;
        let userAnswers = new Array(questions.length).fill(null);

        function displayQuestion() {
            const question = questions[currentQuestion];
            document.getElementById('question-text').innerHTML = question.question;

            const optionsContainer = document.getElementById('options-container');
            optionsContainer.innerHTML = '';

            question.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.className = `btn btn-outline-primary ${userAnswers[currentQuestion] === index ? 'active' : ''}`;
                button.innerHTML = option;
                button.onclick = () => selectAnswer(index);
                optionsContainer.appendChild(button);
            });

            document.getElementById('question-number').textContent =
                `Question ${currentQuestion + 1} of ${questions.length}`;

            document.getElementById('prev-btn').disabled = currentQuestion === 0;
            document.getElementById('next-btn').innerHTML =
                currentQuestion === questions.length - 1 ? 'Finish' : 'Next';

            MathJax.typesetPromise();
        }

        function selectAnswer(index) {
            userAnswers[currentQuestion] = index;
            displayQuestion();
        }

        function calculateScore() {
            const correct = userAnswers.reduce((sum, answer, index) =>
                sum + (answer === questions[index].correct ? 1 : 0), 0);
            return Math.round((correct / questions.length) * 100);
        }

        function showResults() {
            const quizContainer = document.getElementById('quiz-container');
            const resultsContainer = document.getElementById('results-container');
            const reviewContainer = document.getElementById('review-container');

            quizContainer.style.display = 'none';
            resultsContainer.style.display = 'block';

            document.getElementById('score').textContent = calculateScore();

            reviewContainer.innerHTML = questions.map((question, index) => `
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="mb-2">${index + 1}. ${question.question}</p>
                        <p class="mb-2">Your answer: ${question.options[userAnswers[index]]}</p>
                        <p class="mb-2">Correct answer: ${question.options[question.correct]}</p>
                        <p class="mb-0">Explanation: ${question.explanation}</p>
                    </div>
                </div>
            `).join('');

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
            document.getElementById('quiz-container').style.display = 'block';
            document.getElementById('results-container').style.display = 'none';
            displayQuestion();
        };

        // Initialize quiz
        displayQuestion();
    </script>
    @endpush
</x-layout>
