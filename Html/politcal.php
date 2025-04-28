<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Political Quiz</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f2f5;
            color: #333;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #1a237e;
            text-align: center;
            margin-bottom: 30px;
        }
        .quiz-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .question-container {
            width: 100%;
            margin-bottom: 20px;
            display: none;
        }
        .question {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 500;
        }
        .answer-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .result {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        .correct {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .incorrect {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        button {
            background-color: #3f51b5;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #303f9f;
        }
        .stats {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
        .progress {
            margin-top: 20px;
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background-color: #3f51b5;
            width: 0%;
            transition: width 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>US Political Quiz</h1>
        <div class="quiz-container">
            <div class="question-container" id="questionContainer">
                <div class="question" id="question"></div>
                <input type="text" class="answer-input" id="answerInput" placeholder="Type your answer here...">
                <button id="submitButton">Submit Answer</button>
                <div class="result" id="result"></div>
            </div>
            <button id="startButton">Start Quiz</button>
            <div class="stats" id="stats"></div>
            <div class="progress">
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </div>
    </div>

    <script>
        const questions = [
            {
                question: "How many years is one term for a US President?",
                answer: "4",
                alternateAnswers: ["four", "4 years", "four years"]
            },
            {
                question: "How many amendments are in the US Constitution?",
                answer: "27",
                alternateAnswers: ["twenty-seven", "twenty seven"]
            },
            {
                question: "Who is called the 'Father of the Constitution'?",
                answer: "James Madison",
                alternateAnswers: ["madison"]
            },
            {
                question: "What political party did Abraham Lincoln belong to?",
                answer: "Republican",
                alternateAnswers: ["republican party", "the republican party"]
            },
            {
                question: "How many justices serve on the US Supreme Court?",
                answer: "9",
                alternateAnswers: ["nine"]
            },
            {
                question: "What is the minimum age to be President of the United States?",
                answer: "35",
                alternateAnswers: ["thirty-five", "thirty five"]
            },
            {
                question: "Which constitutional amendment abolished slavery?",
                answer: "13",
                alternateAnswers: ["thirteenth", "13th", "thirteenth amendment"]
            },
            {
                question: "Which branch of government can declare war?",
                answer: "Congress",
                alternateAnswers: ["legislative", "legislative branch"]
            },
            {
                question: "What is the term length for a US Senator?",
                answer: "6",
                alternateAnswers: ["six", "6 years", "six years"]
            },
            {
                question: "How many electoral votes are needed to win the presidency?",
                answer: "270",
                alternateAnswers: ["two hundred seventy", "two hundred and seventy"]
            },
            {
                question: "Which amendment guarantees freedom of speech?",
                answer: "1",
                alternateAnswers: ["first", "1st", "first amendment"]
            },
            {
                question: "What is the name of the legislative body that represents states equally?",
                answer: "Senate",
                alternateAnswers: ["the senate", "u.s. senate", "us senate"]
            },
            {
                question: "Which amendment gave women the right to vote?",
                answer: "19",
                alternateAnswers: ["nineteenth", "19th", "nineteenth amendment"]
            },
            {
                question: "What is the name of the official residence of the US President?",
                answer: "White House",
                alternateAnswers: ["the white house", "whitehouse"]
            },
            {
                question: "What is the term of office for a member of the House of Representatives?",
                answer: "2",
                alternateAnswers: ["two", "2 years", "two years"]
            },
            {
                question: "Which amendment protects against unreasonable searches and seizures?",
                answer: "4",
                alternateAnswers: ["fourth", "4th", "fourth amendment"]
            },
            {
                question: "What is the name of the political system where power is divided between national and state governments?",
                answer: "Federalism",
                alternateAnswers: ["federal system"]
            },
            {
                question: "Who is the Commander-in-Chief of the US military?",
                answer: "President",
                alternateAnswers: ["the president", "us president", "u.s. president"]
            },
            {
                question: "What is the name of the process used to remove a president from office?",
                answer: "Impeachment",
                alternateAnswers: ["impeach"]
            },
            {
                question: "Which amendment prohibits cruel and unusual punishment?",
                answer: "8",
                alternateAnswers: ["eighth", "8th", "eighth amendment"]
            },
            {
                question: "What is the term for a congressional session lasting two years?",
                answer: "Congress",
                alternateAnswers: ["a congress"]
            },
            {
                question: "Which amendment gives citizens the right to bear arms?",
                answer: "2",
                alternateAnswers: ["second", "2nd", "second amendment"]
            },
            {
                question: "What is the highest court in the United States?",
                answer: "Supreme Court",
                alternateAnswers: ["the supreme court", "u.s. supreme court", "us supreme court"]
            },
            {
                question: "What is the official name of the lower house of Congress?",
                answer: "House of Representatives",
                alternateAnswers: ["the house", "house"]
            },
            {
                question: "Which amendment abolished poll taxes in federal elections?",
                answer: "24",
                alternateAnswers: ["twenty-fourth", "24th", "twenty fourth", "twenty-fourth amendment"]
            },
            {
                question: "What is the minimum age to be a US Senator?",
                answer: "30",
                alternateAnswers: ["thirty"]
            },
            {
                question: "What is the term for a president's rejection of a bill passed by Congress?",
                answer: "Veto",
                alternateAnswers: ["a veto", "the veto"]
            },
            {
                question: "Which amendment lowered the voting age to 18?",
                answer: "26",
                alternateAnswers: ["twenty-sixth", "26th", "twenty sixth", "twenty-sixth amendment"]
            },
            {
                question: "What is the name of the process of admitting a new state to the Union?",
                answer: "Admission",
                alternateAnswers: ["state admission"]
            },
            {
                question: "Who has the power to confirm presidential appointments?",
                answer: "Senate",
                alternateAnswers: ["the senate", "u.s. senate", "us senate"]
            },
            {
                question: "Which amendment prohibits alcohol?",
                answer: "18",
                alternateAnswers: ["eighteenth", "18th", "eighteenth amendment"]
            },
            {
                question: "Which amendment repealed prohibition?",
                answer: "21",
                alternateAnswers: ["twenty-first", "21st", "twenty first", "twenty-first amendment"]
            },
            {
                question: "What is the minimum age to be a member of the House of Representatives?",
                answer: "25",
                alternateAnswers: ["twenty-five", "twenty five"]
            },
            {
                question: "What document begins with 'We the People'?",
                answer: "Constitution",
                alternateAnswers: ["the constitution", "u.s. constitution", "us constitution", "united states constitution"]
            },
            {
                question: "Which amendment guarantees the right to a speedy and public trial?",
                answer: "6",
                alternateAnswers: ["sixth", "6th", "sixth amendment"]
            },
            {
                question: "What is the name of the meeting where political parties select their presidential candidate?",
                answer: "Convention",
                alternateAnswers: ["national convention", "party convention"]
            },
            {
                question: "Which state has the most electoral votes?",
                answer: "California",
                alternateAnswers: ["ca"]
            },
            {
                question: "What is the term for the first ten amendments to the Constitution?",
                answer: "Bill of Rights",
                alternateAnswers: ["the bill of rights"]
            },
            {
                question: "What is the name of the executive department responsible for foreign policy?",
                answer: "State Department",
                alternateAnswers: ["department of state", "the state department"]
            },
            {
                question: "How many members are in the House of Representatives?",
                answer: "435",
                alternateAnswers: ["four hundred thirty-five", "four hundred thirty five", "four hundred and thirty-five"]
            }
        ];

        let currentQuestion = -1;
        let score = 0;
        let answeredQuestions = 0;
        const questionElement = document.getElementById('question');
        const answerInput = document.getElementById('answerInput');
        const submitButton = document.getElementById('submitButton');
        const resultElement = document.getElementById('result');
        const startButton = document.getElementById('startButton');
        const questionContainer = document.getElementById('questionContainer');
        const statsElement = document.getElementById('stats');
        const progressBar = document.getElementById('progressBar');

        function showQuestion() {
            if (currentQuestion >= 0) {
                document.getElementById('questionContainer').style.display = 'block';
                document.getElementById('question').textContent = questions[currentQuestion].question;
                document.getElementById('answerInput').value = '';
                document.getElementById('result').style.display = 'none';
                document.getElementById('answerInput').focus();
            }
        }

        function checkAnswer() {
            const userAnswer = answerInput.value.trim().toLowerCase();
            const correctAnswer = questions[currentQuestion].answer.toLowerCase();
            const alternateAnswers = questions[currentQuestion].alternateAnswers.map(ans => ans.toLowerCase());
            
            const isCorrect = userAnswer === correctAnswer || alternateAnswers.includes(userAnswer);
            
            resultElement.textContent = isCorrect 
                ? `Correct! The answer is "${questions[currentQuestion].answer}".` 
                : `Incorrect. The correct answer is "${questions[currentQuestion].answer}".`;
            
            resultElement.className = isCorrect ? 'result correct' : 'result incorrect';
            resultElement.style.display = 'block';
            
            if (isCorrect) {
                score++;
            }
            
            answeredQuestions++;
            updateStats();
            
            submitButton.textContent = answeredQuestions < questions.length ? 'Next Question' : 'See Final Score';
            submitButton.removeEventListener('click', checkAnswer);
            submitButton.addEventListener('click', nextQuestion);
        }

        function nextQuestion() {
            if (answeredQuestions < questions.length) {
                currentQuestion = Math.floor(Math.random() * questions.length);
                // Make sure we don't repeat questions
                while (questions[currentQuestion].answered) {
                    currentQuestion = Math.floor(Math.random() * questions.length);
                }
                questions[currentQuestion].answered = true;
                showQuestion();
                submitButton.textContent = 'Submit Answer';
                submitButton.removeEventListener('click', nextQuestion);
                submitButton.addEventListener('click', checkAnswer);
            } else {
                questionElement.textContent = `Quiz Complete! Your final score is ${score} out of ${questions.length}.`;
                answerInput.style.display = 'none';
                submitButton.style.display = 'none';
                resultElement.style.display = 'none';
                startButton.style.display = 'block';
                startButton.textContent = 'Restart Quiz';
                
                // Reset the quiz
                questions.forEach(q => q.answered = false);
                score = 0;
                answeredQuestions = 0;
            }
        }

        function updateStats() {
            statsElement.textContent = `Score: ${score} / ${answeredQuestions}`;
            const progressPercentage = (answeredQuestions / questions.length) * 100;
            progressBar.style.width = `${progressPercentage}%`;
        }

        function startQuiz() {
            startButton.style.display = 'none';
            questionContainer.style.display = 'block';
            currentQuestion = Math.floor(Math.random() * questions.length);
            questions[currentQuestion].answered = true;
            showQuestion();
            updateStats();
            submitButton.addEventListener('click', checkAnswer);
        }

        startButton.addEventListener('click', startQuiz);

        // Add event listener for enter key on input
        answerInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                if (submitButton.textContent === 'Submit Answer') {
                    checkAnswer();
                } else {
                    nextQuestion();
                }
            }
        });
    </script>
</body>
</html>