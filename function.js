function explainAddition() {
    const examples = [
        { num1: 2, num2: 3, context: "2 apples and 3 more apples" },
        { num1: 4, num2: 5, context: "4 balloons and 5 more balloons" },
        { num1: 1, num2: 3, context: "1 cookie and 3 more cookies" },
        { num1: 6, num2: 4, context: "6 stickers and you get 4 more stickers" },
        { num1: 5, num2: 7, context: "5 marbles and you add 7 marbles" },
        { num1: 3, num2: 2, context: "3 toy cars and you buy 2 more toy cars" },
        { num1: 8, num2: 1, context: "8 books and you receive 1 more book" },
        { num1: 2, num2: 2, context: "2 dogs and you adopt 2 more dogs" },
        { num1: 4, num2: 0, context: "4 candies and you add none" },
        { num1: 1, num2: 3, context: "1 pencil and you sharpen 3 more pencils" }
    ];
  
    const shuffledExamples = examples.sort(() => 0.5 - Math.random()).slice(0, 5);
  
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '500px';
    container.style.overflowY = 'auto';

    let speechEnabled = false;
    let currentExampleIndex = 0;

    const exampleDivs = [];

    for (let i = 0; i < shuffledExamples.length; i++) {
        const { num1, num2, context } = shuffledExamples[i];
        const correctAnswer = num1 + num2;

        const exampleDiv = document.createElement('div');
        exampleDiv.innerHTML = `
            <strong>Example ${i + 1}:</strong><br>
            We have ${num1} and we want to add ${num2}.<br>
            This means:<br>
            ${num1} + ${num2} means we are starting with ${context}.<br>
            So, the total is ${correctAnswer}.<br>
        `;
        
        const separator = document.createElement('hr');
        separator.style.border = '1px solid #ccc';
        exampleDiv.appendChild(separator);
  
        exampleDivs.push(exampleDiv);
        container.appendChild(exampleDiv);
    }

    // Toggle Speech Button
    const toggleSpeechButton = document.createElement('button');
    toggleSpeechButton.innerText = 'Toggle Speech';
    toggleSpeechButton.style.fontSize = '16px';
    toggleSpeechButton.style.backgroundColor = '#3498db';
    toggleSpeechButton.style.color = 'white';
    toggleSpeechButton.style.border = 'none';
    toggleSpeechButton.style.borderRadius = '5px';
    toggleSpeechButton.style.padding = '10px 15px';
    toggleSpeechButton.style.cursor = 'pointer';
    container.appendChild(toggleSpeechButton);

    toggleSpeechButton.onclick = function() {
        speechEnabled = !speechEnabled;
        toggleSpeechButton.innerText = speechEnabled ? 'Turn Speech Off' : 'Turn Speech On';

        if (speechEnabled) {
            currentExampleIndex = 0;
            readExamples();
        } else {
            window.speechSynthesis.cancel();
            clearHighlights();
        }
    };

    // Read examples and highlight
    function readExamples() {
        if (currentExampleIndex < shuffledExamples.length) {
            const { num1, num2, context } = shuffledExamples[currentExampleIndex];
            const correctAnswer = num1 + num2;

            const textToRead = `We have ${num1} and we want to add ${num2}. This means: ${num1} + ${num2} means we are starting with ${context}. So, the total is ${correctAnswer}. `;
            const speechInstance = new SpeechSynthesisUtterance(textToRead);

            // Highlight current example
            highlightCurrentExample(currentExampleIndex);

            // Move to the next example when current one is finished
            speechInstance.onend = function() {
                clearHighlights();
                currentExampleIndex++;
                readExamples();
            };

            window.speechSynthesis.speak(speechInstance);
        }
    }

    // Highlight the current example
    function highlightCurrentExample(index) {
        clearHighlights();
        exampleDivs[index].style.backgroundColor = '#d2b48c'; // Light brown color
    }

    // Clear highlights
    function clearHighlights() {
        exampleDivs.forEach(div => {
            div.style.backgroundColor = ''; // Reset to original color
        });
    }

    // Cancel Button
    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel Speech';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#e74c3c';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    container.appendChild(cancelButton);

    cancelButton.onclick = function() {
        window.speechSynthesis.cancel();
        clearHighlights();
        speechEnabled = false;
        toggleSpeechButton.innerText = 'Turn Speech On';
    };

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#e74c3c';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
  
    closeButton.onclick = function() {
        container.remove();
        window.speechSynthesis.cancel();
        clearHighlights();
    };
  
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Start the explanation
explainAddition();

function explainSubtraction() {
    const examples = [
        { num1: 5, num2: 2, context: "5 apples and you eat 2 apples" },
        { num1: 10, num2: 3, context: "10 balloons and 3 float away" },
        { num1: 6, num2: 1, context: "6 cookies and you give away 1 cookie" },
        { num1: 8, num2: 4, context: "8 stickers and you lose 4 stickers" },
        { num1: 9, num2: 5, context: "9 marbles and you remove 5 marbles" },
        { num1: 7, num2: 2, context: "7 toy cars and you sell 2 toy cars" },
        { num1: 12, num2: 1, context: "12 books and you return 1 book" },
        { num1: 4, num2: 2, context: "4 dogs and 2 run away" },
        { num1: 15, num2: 0, context: "15 candies and you don't eat any" },
        { num1: 5, num2: 3, context: "5 pencils and you lose 3 pencils" }
    ];

    const shuffledExamples = examples.sort(() => 0.5 - Math.random()).slice(0, 5);

    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '500px';
    container.style.overflowY = 'auto';

    let speechEnabled = false;
    let currentExampleIndex = 0;

    const exampleDivs = [];

    for (let i = 0; i < shuffledExamples.length; i++) {
        const { num1, num2, context } = shuffledExamples[i];
        const correctAnswer = num1 - num2;

        const exampleDiv = document.createElement('div');
        exampleDiv.innerHTML = `
            <strong>Example ${i + 1}:</strong><br>
            We have ${num1} and we want to subtract ${num2}.<br>
            This means:<br>
            ${num1} - ${num2} means we are starting with ${context}.<br>
            So, the total is ${correctAnswer}.<br>
        `;
        
        const separator = document.createElement('hr');
        separator.style.border = '1px solid #ccc';
        exampleDiv.appendChild(separator);

        exampleDivs.push(exampleDiv);
        container.appendChild(exampleDiv);
    }

    // Toggle Speech Button
    const toggleSpeechButton = document.createElement('button');
    toggleSpeechButton.innerText = 'Toggle Speech';
    toggleSpeechButton.style.fontSize = '16px';
    toggleSpeechButton.style.backgroundColor = '#3498db';
    toggleSpeechButton.style.color = 'white';
    toggleSpeechButton.style.border = 'none';
    toggleSpeechButton.style.borderRadius = '5px';
    toggleSpeechButton.style.padding = '10px 15px';
    toggleSpeechButton.style.cursor = 'pointer';
    container.appendChild(toggleSpeechButton);

    toggleSpeechButton.onclick = function() {
        speechEnabled = !speechEnabled;
        toggleSpeechButton.innerText = speechEnabled ? 'Turn Speech Off' : 'Turn Speech On';

        if (speechEnabled) {
            currentExampleIndex = 0;
            readExamples();
        } else {
            window.speechSynthesis.cancel();
            clearHighlights();
        }
    };

    // Read examples and highlight
    function readExamples() {
        if (currentExampleIndex < shuffledExamples.length) {
            const { num1, num2, context } = shuffledExamples[currentExampleIndex];
            const correctAnswer = num1 - num2;

            const textToRead = `We have ${num1} and we want to subtract ${num2}. This means: ${num1} - ${num2} means we are starting with ${context}. So, the total is ${correctAnswer}. `;
            const speechInstance = new SpeechSynthesisUtterance(textToRead);

            // Highlight current example
            highlightCurrentExample(currentExampleIndex);

            // Move to the next example when current one is finished
            speechInstance.onend = function() {
                clearHighlights();
                currentExampleIndex++;
                readExamples();
            };

            window.speechSynthesis.speak(speechInstance);
        }
    }

    // Highlight the current example
    function highlightCurrentExample(index) {
        clearHighlights();
        exampleDivs[index].style.backgroundColor = '#d2b48c'; // Light brown color
    }

    // Clear highlights
    function clearHighlights() {
        exampleDivs.forEach(div => {
            div.style.backgroundColor = ''; // Reset to original color
        });
    }

    // Cancel Button
    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel Speech';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#e74c3c';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    container.appendChild(cancelButton);

    cancelButton.onclick = function() {
        window.speechSynthesis.cancel();
        clearHighlights();
        speechEnabled = false;
        toggleSpeechButton.innerText = 'Turn Speech On';
    };

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#e74c3c';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
  
    closeButton.onclick = function() {
        container.remove();
        window.speechSynthesis.cancel();
        clearHighlights();
    };
  
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Start the explanation
explainSubtraction();

function Additiontest() {
    // Example exercises
    const exercises = [
        { num1: 3, num2: 2, context: "3 apples and you buy 2 more apples", answers: [5, 6, 4, 7] },
        { num1: 5, num2: 4, context: "5 balloons and you get 4 more balloons", answers: [8, 9, 7, 6] },
        { num1: 1, num2: 3, context: "1 cookie and you bake 3 more cookies", answers: [4, 3, 5, 6] },
        { num1: 6, num2: 5, context: "6 stickers and you receive 5 stickers", answers: [11, 12, 10, 9] },
        { num1: 2, num2: 7, context: "2 marbles and you find 7 more marbles", answers: [9, 8, 10, 7] },
        { num1: 4, num2: 6, context: "4 toy cars and you get 6 toy cars as a gift", answers: [10, 9, 11, 12] },
        { num1: 10, num2: 2, context: "10 books and you buy 2 more books", answers: [12, 10, 11, 13] },
        { num1: 3, num2: 3, context: "3 dogs and you adopt 3 more dogs", answers: [5, 6, 4, 7] },
        { num1: 5, num2: 0, context: "5 candies and you buy none", answers: [5, 6, 4, 7] },
        { num1: 4, num2: 1, context: "4 pencils and you add 1 more pencil", answers: [5, 4, 6, 7] }
    ];

    // Shuffle the exercises and take the first 5
    const shuffledExercises = exercises.sort(() => Math.random() - 0.5).slice(0, 5);

    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center'; // Center text
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '80vh';
    container.style.overflowY = 'scroll'; // Enable scrolling

    let totalScore = 0; // Initialize total score

    shuffledExercises.forEach((exercise, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.style.border = '2px solid black';
        questionDiv.style.margin = '10px 0';
        questionDiv.style.padding = '10px';
        questionDiv.style.backgroundColor = '#f9f9f9'; // Light background for emphasis
        questionDiv.style.borderRadius = '5px'; // Rounded corners

        questionDiv.innerHTML = `
            <strong>Addition Question ${index + 1}:</strong><br>
            <span style="font-size: 20px; font-weight: bold;">${exercise.context}</span><br>
        `;
        
        exercise.answers.forEach(answer => {
            const answerId = `answer-${index}-${answer}`;
            questionDiv.innerHTML += `
                <label>
                    <input type="radio" name="answer-${index}" value="${answer}" id="${answerId}">
                    ${answer}
                </label><br>
            `;
        });

        const explanationDiv = document.createElement('div');
        explanationDiv.id = `explanation-${index}`;
        explanationDiv.style.marginTop = '20px';

        questionDiv.appendChild(explanationDiv);
        container.appendChild(questionDiv);
    });

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit All';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#3498db';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        let allAnswered = true;
        let totalScore = 0; // Reset total score for each submission
        let exerciseName = 'Random Addition Exercise'; // Example exercise name

        shuffledExercises.forEach((exercise, index) => {
            const userAnswer = document.querySelector(`input[name="answer-${index}"]:checked`);
            const explanationDiv = document.getElementById(`explanation-${index}`);
            
            if (!userAnswer) {
                allAnswered = false;
                explanationDiv.innerHTML = `<span style="color: red;">Please select an answer for this question.</span>`;
            } else {
                const selectedValue = parseInt(userAnswer.value);
                const correctAnswer = exercise.num1 + exercise.num2;

                if (selectedValue === correctAnswer) {
                    totalScore++; // Increment score for correct answer
                }

                explanationDiv.innerHTML = `
                    <strong>Explanation:</strong><br>
                    We added ${exercise.num1} and ${exercise.num2}.<br>
                    So, the calculation is: ${exercise.num1} + ${exercise.num2} = ${correctAnswer}.<br>
                    Your answer was: ${selectedValue}.<br>
                    ${selectedValue === correctAnswer ? "Great job! That's correct!" : "That's not quite right. Try again next time!"}
                `;
            }
        });

        if (!allAnswered) {
            alert("Please answer all the questions before submitting!");
            return;
        }

        alert(`You scored: ${totalScore} out of ${shuffledExercises.length}`);
        
        // Send the score to the server
        const data = {
            score: totalScore,
            exercise_name: exerciseName
        };

        fetch('save_results.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                console.log("Result saved successfully!");
            } else {
                console.error("Error saving result:", result.message);
            }
        })
        .catch(error => console.error("Error:", error));

        submitButton.disabled = true; // Disable after submission
    };

    closeButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Start the Addition Test
Additiontest();

function Subtractiontest() {
    // Example subtraction exercises
    const exercises = [
        { num1: 8, num2: 3, context: "8 apples and you give away 3 apples", answers: [5, 6, 4, 7] },
        { num1: 10, num2: 4, context: "10 balloons and you give away 4 balloons", answers: [6, 5, 7, 8] },
        { num1: 7, num2: 2, context: "7 cookies and you eat 2 cookies", answers: [5, 4, 6, 3] },
        { num1: 9, num2: 5, context: "9 stickers and you lose 5 stickers", answers: [4, 5, 3, 6] },
        { num1: 10, num2: 7, context: "10 marbles and you give away 7 marbles", answers: [3, 4, 2, 5] },
        { num1: 12, num2: 6, context: "12 toy cars and you lose 6 toy cars", answers: [6, 7, 8, 5] },
        { num1: 15, num2: 5, context: "15 books and you give away 5 books", answers: [10, 11, 9, 12] },
        { num1: 8, num2: 3, context: "8 dogs and you give away 3 dogs", answers: [5, 4, 6, 3] },
        { num1: 6, num2: 2, context: "6 candies and you eat 2 candies", answers: [3, 4, 5, 2] },
        { num1: 9, num2: 4, context: "9 pencils and you give away 4 pencils", answers: [5, 6, 7, 8] }
    ];

    // Shuffle the exercises and take the first 5
    const shuffledExercises = exercises.sort(() => Math.random() - 0.5).slice(0, 5);

    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center'; // Center text
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '80vh';
    container.style.overflowY = 'scroll'; // Enable scrolling

    let totalScore = 0; // Initialize total score
    let allAnswered = true; // Track if all questions are answered
    let userAnswers = []; // Store user answers to calculate later

    shuffledExercises.forEach((exercise, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.style.border = '2px solid black';
        questionDiv.style.margin = '10px 0';
        questionDiv.style.padding = '10px';
        questionDiv.style.backgroundColor = '#f9f9f9'; // Light background for emphasis
        questionDiv.style.borderRadius = '5px'; // Rounded corners

        questionDiv.innerHTML = `
            <strong>Subtraction Question ${index + 1}:</strong><br>
            <span style="font-size: 20px; font-weight: bold;">${exercise.context}</span><br>
        `;
        
        exercise.answers.forEach(answer => {
            const answerId = `answer-${index}-${answer}`;
            questionDiv.innerHTML += `
                <label>
                    <input type="radio" name="answer-${index}" value="${answer}" id="${answerId}">
                    ${answer}
                </label><br>
            `;
        });

        // Create an explanation div for this question, but hide it initially
        const explanationDiv = document.createElement('div');
        explanationDiv.id = `explanation-${index}`;
        explanationDiv.style.marginTop = '20px';
        explanationDiv.style.display = 'none'; // Initially hidden

        questionDiv.appendChild(explanationDiv);
        container.appendChild(questionDiv);
    });

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit All';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#3498db';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        totalScore = 0; // Reset total score for each submission
        allAnswered = true; // Assume all questions are answered
        userAnswers = []; // Clear previous answers

        // Loop over each exercise to check answers and calculate score
        shuffledExercises.forEach((exercise, index) => {
            const userAnswer = document.querySelector(`input[name="answer-${index}"]:checked`);
            const explanationDiv = document.getElementById(`explanation-${index}`);

            if (!userAnswer) {
                allAnswered = false; // If any question is not answered, flag it
                explanationDiv.innerHTML = `<span style="color: red;">Please select an answer for this question.</span>`;
                explanationDiv.style.display = 'block'; // Display error immediately
            } else {
                const selectedValue = parseInt(userAnswer.value);
                const correctAnswer = exercise.num1 - exercise.num2;

                if (selectedValue === correctAnswer) {
                    totalScore++; // Increment score for correct answer
                }

                explanationDiv.innerHTML = `
                    <strong>Explanation:</strong><br>
                    We subtracted ${exercise.num2} from ${exercise.num1}.<br>
                    So, the calculation is: ${exercise.num1} - ${exercise.num2} = ${correctAnswer}.<br>
                    Your answer was: ${selectedValue}.<br>
                    ${selectedValue === correctAnswer ? "Great job! That's correct!" : "That's not quite right. Try again next time!"}
                `;
            }
        });

        if (!allAnswered) {
            alert("Please answer all the questions before submitting!");
            return; // Stop the process if not all questions are answered
        }

        // Show the score first
        alert(`You scored: ${totalScore} out of ${shuffledExercises.length}`);

        // Now show all explanations for all questions
        shuffledExercises.forEach((exercise, index) => {
            const explanationDiv = document.getElementById(`explanation-${index}`);
            explanationDiv.style.display = 'block'; // Ensure explanation is visible now
        });

        // Send the score to the server
        const data = {
            score: totalScore,
            exercise_name: 'Random Subtraction Exercise'
        };

        fetch('save_results.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                console.log("Result saved successfully!");
            } else {
                console.error("Error saving result:", result.message);
            }
        })
        .catch(error => console.error("Error:", error));

        submitButton.disabled = true; // Disable after submission
    };

    closeButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Start the Subtraction Test
Subtractiontest();


function RandomMathTest() {
    const additionExamples = [
        { num1: 3, num2: 2, context: "3 apples and you buy 2 more apples" },
        { num1: 5, num2: 4, context: "5 balloons and you get 4 more balloons" },
        { num1: 1, num2: 3, context: "1 cookie and you bake 3 more cookies" },
        { num1: 6, num2: 5, context: "6 stickers and you receive 5 stickers" },
        { num1: 2, num2: 7, context: "2 marbles and you find 7 more marbles" },
        { num1: 4, num2: 6, context: "4 toy cars and you get 6 toy cars as a gift" },
        { num1: 10, num2: 2, context: "10 books and you buy 2 more books" },
        { num1: 3, num2: 3, context: "3 dogs and you adopt 3 more dogs" },
        { num1: 5, num2: 0, context: "5 candies and you buy none" },
        { num1: 4, num2: 1, context: "4 pencils and you add 1 more pencil" }
    ];

    const subtractionExamples = [
        { num1: 5, num2: 2, context: "5 apples and you eat 2 apples" },
        { num1: 6, num2: 1, context: "6 balloons and 1 balloon flies away" },
        { num1: 4, num2: 3, context: "4 cookies and you give away 3 cookies" },
        { num1: 7, num2: 4, context: "7 stickers and you lose 4 stickers" },
        { num1: 9, num2: 5, context: "9 marbles and you take away 5 marbles" },
        { num1: 8, num2: 2, context: "8 toy cars and you sell 2 toy cars" },
        { num1: 10, num2: 3, context: "10 books and you lend 3 books" },
        { num1: 3, num2: 1, context: "3 dogs and 1 dog goes to a friend" },
        { num1: 5, num2: 0, context: "5 candies and you eat none" },
        { num1: 4, num2: 2, context: "4 pencils and you lose 2 pencils" }
    ];

    // Shuffle and select 3 random examples from each category
    const shuffledAdditionExamples = additionExamples.sort(() => 0.5 - Math.random()).slice(0, 3);
    const shuffledSubtractionExamples = subtractionExamples.sort(() => 0.5 - Math.random()).slice(0, 3);

    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '500px';
    container.style.overflowY = 'auto';

    let score = 0;

    // Function to create questions
    function createQuestion(example, index, isAddition) {
        const { num1, num2, context } = example;
        const correctAnswer = isAddition ? num1 + num2 : num1 - num2;

        const exampleDiv = document.createElement('div');
        exampleDiv.style.border = '1px solid black';
        exampleDiv.style.marginBottom = '10px';
        exampleDiv.style.padding = '10px';

        exampleDiv.innerHTML = `
            <strong>${isAddition ? "Addition" : "Subtraction"} Question ${index + 1}:</strong><br>
            ${context}<br>
            What is ${num1} ${isAddition ? '+' : '-'} ${num2}?<br>
        `;

        const answers = [correctAnswer, correctAnswer + 1, correctAnswer - 1, correctAnswer + 2];
        const shuffledAnswers = answers.sort(() => 0.5 - Math.random());

        shuffledAnswers.forEach(answer => {
            const label = document.createElement('label');
            label.innerHTML = `
                <input type="radio" name="question${index}" value="${answer}" />
                ${answer}<br>
            `;
            exampleDiv.appendChild(label);
        });

        exampleDiv.setAttribute('data-index', index); // Store the index for later use
        container.appendChild(exampleDiv);
    }

    // Create addition questions
    shuffledAdditionExamples.forEach((example, index) => createQuestion(example, index, true));
    // Create subtraction questions
    shuffledSubtractionExamples.forEach((example, index) => createQuestion(example, index + 3, false));

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#3498db';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    cancelButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        score = 0; // Reset score
        let allAnswered = true; // Flag to check if all questions are answered

        // Check answers for addition questions
        shuffledAdditionExamples.forEach((example, index) => {
            const selectedAnswer = document.querySelector(`input[name="question${index}"]:checked`);
            const exampleDiv = container.children[index];

            if (selectedAnswer) {
                if (parseInt(selectedAnswer.value) === example.num1 + example.num2) {
                    score++;
                }
            } else {
                allAnswered = false; // Mark as not all answered
                exampleDiv.style.backgroundColor = '#ffcccc'; // Highlight unanswered question
            }
        });

        // Check answers for subtraction questions
        shuffledSubtractionExamples.forEach((example, index) => {
            const selectedAnswer = document.querySelector(`input[name="question${index + 3}"]:checked`);
            const exampleDiv = container.children[index + 3];

            if (selectedAnswer) {
                if (parseInt(selectedAnswer.value) === example.num1 - example.num2) {
                    score++;
                }
            } else {
                allAnswered = false; // Mark as not all answered
                exampleDiv.style.backgroundColor = '#ffcccc'; // Highlight unanswered question
            }
        });

        if (!allAnswered) {
            alert("Please answer all the questions before submitting.");
        } else {
            const resultMessage = score === 6 
                ? "Good work! Your score is 6/6!"
                : `Your score is ${score} out of 6`;
            alert(resultMessage);
            // Send the score to the server
        const data = {
            score: score,
            exercise_name: 'Random Math Test'
        };

        fetch('save_results.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                console.log("Result saved successfully!");
            } else {
                console.error("Error saving result:", result.message);
            }
        })
        .catch(error => console.error("Error:", error));

        container.remove(); // Remove the interface after submission
        }
    };

    cancelButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(cancelButton);
    document.body.appendChild(container);
}

// Start the random math test
RandomMathTest();

function explainRandomSubtractionExercises() {
    const exercises = [
        { num1: 10, num2: 4, context: "10 stickers - 4 stickers", operation: "subtract", answers: [6, 5, 7] },
        { num1: 8, num2: 3, context: "8 balloons - 3 balloons", operation: "subtract", answers: [5, 6, 4] },
        { num1: 15, num2: 7, context: "15 candies - 7 candies", operation: "subtract", answers: [9, 8, 7] },
        { num1: 12, num2: 5, context: "12 apples - 5 apples", operation: "subtract", answers: [6, 7, 8] },
        { num1: 9, num2: 3, context: "9 dogs - 3 dogs", operation: "subtract", answers: [6, 5, 7] }
    ];

    // Shuffle the exercises and take the first 5
    const shuffledExercises = exercises.sort(() => Math.random() - 0.5).slice(0, 5);
    
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center'; // Center text
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '80vh';
    container.style.overflowY = 'scroll'; // Enable scrolling

    let totalScore = 0; // Initialize total score

    shuffledExercises.forEach((exercise, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.style.border = '2px solid black';
        questionDiv.style.margin = '10px 0';
        questionDiv.style.padding = '10px';
        questionDiv.style.backgroundColor = '#f9f9f9'; // Light background for emphasis
        questionDiv.style.borderRadius = '5px'; // Rounded corners

        questionDiv.innerHTML = `
            <strong>Subtraction Question ${index + 1}:</strong><br>
            <span style="font-size: 20px; font-weight: bold;">${exercise.context}</span><br>
        `;
        
        exercise.answers.forEach(answer => {
            const answerId = `answer-${index}-${answer}`;
            questionDiv.innerHTML += `
                <label>
                    <input type="radio" name="answer-${index}" value="${answer}" id="${answerId}">
                    ${answer}
                </label><br>
            `;
        });

        const explanationDiv = document.createElement('div');
        explanationDiv.id = `explanation-${index}`;
        explanationDiv.style.marginTop = '20px';

        questionDiv.appendChild(explanationDiv);
        container.appendChild(questionDiv);
    });

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit All';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#3498db';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        let allAnswered = true;
        let totalScore = 0; // Reset total score for each submission
        let exerciseName = 'Random Subtraction Exercise'; // Example exercise name
    
        shuffledExercises.forEach((exercise, index) => {
            const userAnswer = document.querySelector(`input[name="answer-${index}"]:checked`);
            const explanationDiv = document.getElementById(`explanation-${index}`);
            
            if (!userAnswer) {
                allAnswered = false;
                explanationDiv.innerHTML = `<span style="color: red;">Please select an answer for this question.</span>`;
            } else {
                const selectedValue = parseInt(userAnswer.value);
                const correctAnswer = exercise.num1 - exercise.num2;

                if (selectedValue === correctAnswer) {
                    totalScore++; // Increment score for correct answer
                }

                explanationDiv.innerHTML = `
                    <strong>Explanation:</strong><br>
                    We subtracted ${exercise.num2} from ${exercise.num1}.<br>
                    So, the calculation is: ${exercise.num1} - ${exercise.num2} = ${correctAnswer}.<br>
                    Your answer was: ${selectedValue}.<br>
                    ${selectedValue === correctAnswer ? "Great job! That's correct!" : "That's not quite right. Try again next time!"}
                `;
            }
        });
    
        if (!allAnswered) {
            alert("Please answer all the questions before submitting!");
            return;
        }

        alert(`You scored: ${totalScore} out of ${shuffledExercises.length}`);

        // Send the score to the server
        const data = {
            score: totalScore,
            exercise_name: exerciseName
        };
    
        fetch('save_results.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                console.log("Result saved successfully!");
            } else {
                console.log(data);
                console.error("Error saving result:", result.message);
            }
        })
        .catch(error => console.error("Error:", error));
    
        submitButton.disabled = true; // Disable after submission
    };

    closeButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Call the function to display the subtraction exercises
explainRandomSubtractionExercises();



function explainRandomAdditionExercises() {
    const exercises = [
        { num1: 10, num2: 4, context: "10 stickers + 4 stickers", operation: "add", answers: [12, 14, 13] },
        { num1: 8, num2: 3, context: "8 balloons + 3 balloons", operation: "add", answers: [10, 11, 12] },
        { num1: 15, num2: 7, context: "15 candies + 7 candies", operation: "add", answers: [21, 22, 20] },
        { num1: 12, num2: 5, context: "12 apples + 5 apples", operation: "add", answers: [16, 17, 15] },
        { num1: 9, num2: 3, context: "9 dogs + 3 dogs", operation: "add", answers: [11, 12, 10] }
    ];

    // Shuffle the exercises and take the first 5
    const shuffledExercises = exercises.sort(() => Math.random() - 0.5).slice(0, 5);
    
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center'; // Center text
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '80vh';
    container.style.overflowY = 'scroll'; // Enable scrolling

    let totalScore = 0; // Initialize total score

    shuffledExercises.forEach((exercise, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.style.border = '2px solid black';
        questionDiv.style.margin = '10px 0';
        questionDiv.style.padding = '10px';
        questionDiv.style.backgroundColor = '#f9f9f9'; // Light background for emphasis
        questionDiv.style.borderRadius = '5px'; // Rounded corners

        questionDiv.innerHTML = `
            <strong>Addition Question ${index + 1}:</strong><br>
            <span style="font-size: 20px; font-weight: bold;">${exercise.context}</span><br>
        `;
        
        exercise.answers.forEach(answer => {
            const answerId = `answer-${index}-${answer}`;
            questionDiv.innerHTML += `
                <label>
                    <input type="radio" name="answer-${index}" value="${answer}" id="${answerId}">
                    ${answer}
                </label><br>
            `;
        });

        const explanationDiv = document.createElement('div');
        explanationDiv.id = `explanation-${index}`;
        explanationDiv.style.marginTop = '20px';

        questionDiv.appendChild(explanationDiv);
        container.appendChild(questionDiv);
    });

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit All';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#3498db';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        let allAnswered = true;
        let totalScore = 0; // Reset total score for each submission
        let exerciseName = 'Random Addition Exercise'; // Example exercise name
        comment = '';
    
        shuffledExercises.forEach((exercise, index) => {
            const userAnswer = document.querySelector(`input[name="answer-${index}"]:checked`);
            const explanationDiv = document.getElementById(`explanation-${index}`);
            
            if (!userAnswer) {
                allAnswered = false;
                explanationDiv.innerHTML = `<span style="color: red;">Please select an answer for this question.</span>`;
            } else {
                const selectedValue = parseInt(userAnswer.value);
                const correctAnswer = exercise.num1 + exercise.num2;
    
                if (selectedValue === correctAnswer) {
                    totalScore++; // Increment score for correct answer
                }
    
                explanationDiv.innerHTML = `
                    <strong>Explanation:</strong><br>
                    We added ${exercise.num1} and ${exercise.num2}.<br>
                    So, the calculation is: ${exercise.num1} + ${exercise.num2} = ${correctAnswer}.<br>
                    Your answer was: ${selectedValue}.<br>
                    ${selectedValue === correctAnswer ? "Great job! That's correct!" : "That's not quite right. Try again next time!"}
                `;
            }
        });
    
        if (!allAnswered) {
            alert("Please answer all the questions before submitting!");
            return;
        }

    
        alert(`You scored: ${totalScore} out of ${shuffledExercises.length}`);
        

        // Send the score to the server
        const data = {
            score: totalScore,
            exercise_name: exerciseName
        };
    
        fetch('save_results.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
           
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                console.log("Result saved successfully!");
            } else {
                onsole.log(data);
                console.error("Error saving result:", result.message);
            }
        })
        .catch(error => console.error("Error:", error));
    
        submitButton.disabled = true; // Disable after submission
    };
    

    closeButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Call the function to display the addition exercises
explainRandomAdditionExercises();

function mathQuestionAndExplanation() {
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';

    const explanationDiv = document.createElement('div');
    explanationDiv.id = 'explanation';
    explanationDiv.style.marginTop = '20px';

    // Speech recognition setup
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';

    const questionInput = document.createElement('input');
    questionInput.type = 'text';
    questionInput.placeholder = 'Ask a math question (e.g., 5 + 3 or 10 - 4)';
    questionInput.style.width = '70%';
    questionInput.style.margin = '5px';

    const speechButton = document.createElement('button');
    speechButton.innerText = 'Speak Question';
    speechButton.style.fontSize = '16px';
    speechButton.style.backgroundColor = '#2ecc71';
    speechButton.style.color = 'white';
    speechButton.style.border = 'none';
    speechButton.style.borderRadius = '5px';
    speechButton.style.padding = '10px 15px';
    speechButton.style.cursor = 'pointer';
    speechButton.style.marginLeft = '5px';

    // Handle speech input
    speechButton.onclick = function () {
        speak("Please ask your math question.");
        recognition.start();
    };

    recognition.onresult = function (event) {
        const transcript = event.results[0][0].transcript.trim();
        questionInput.value = transcript; // Fill the input with the spoken question
        handleMathQuestion(transcript); // Automatically process the question
    };

    recognition.onerror = function (event) {
        console.error('Speech recognition error: ', event.error);
    };

    const handleMathQuestion = (question) => {
        const match = question.match(/^(\d+)\s*([\+\-])\s*(\d+)$/); // Match valid addition or subtraction

        if (match) {
            const num1 = parseInt(match[1]);
            const operator = match[2];
            const num2 = parseInt(match[3]);
            let result;
            let explanation;

            if (operator === '+') {
                result = num1 + num2;
                explanation = `To solve ${num1} plus ${num2}, we add the two numbers together. The result is ${result}.`;
            } else if (operator === '-') {
                result = num1 - num2;
                explanation = `To solve ${num1} minus ${num2}, we subtract ${num2} from ${num1}. The result is ${result}.`;
            }

            explanationDiv.innerHTML = `
                <strong>Question:</strong> ${question}<br>
                <strong>Answer:</strong> ${result}<br>
                <strong>Explanation:</strong> ${explanation}
            `;

            // Speech synthesis
            const speechText = `The answer is ${result}. ${explanation}`;
            speak(speechText);
        } else {
            explanationDiv.innerHTML = `<span style="color: red;">Please enter or ask a valid addition or subtraction question (e.g., 5 + 3 or 10 - 4).</span>`;
        }
    };

    const speak = (text) => {
        const utterance = new SpeechSynthesisUtterance(text);
        speechSynthesis.speak(utterance);
    };

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Get Answer';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    // Handle typed input submission
    submitButton.onclick = function () {
        const question = questionInput.value.trim();
        handleMathQuestion(question);
    };

    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px';
    closeButton.style.backgroundColor = '#3498db';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';

    closeButton.onclick = function () {
        container.remove(); // Close the interface
    };

    container.appendChild(questionInput);
    container.appendChild(speechButton);
    container.appendChild(submitButton);
    container.appendChild(explanationDiv);
    container.appendChild(closeButton);
    document.body.appendChild(container);
}

// Call the function to allow students to ask math questions
mathQuestionAndExplanation();



function Additionstructured() {
    const examples = [
        { num1: 3, num2: 2, context: "3 apples and you buy 2 more apples" },
        { num1: 5, num2: 4, context: "5 balloons and you get 4 more balloons" },
        { num1: 1, num2: 3, context: "1 cookie and you bake 3 more cookies" },
        { num1: 6, num2: 5, context: "6 stickers and you receive 5 stickers" },
        { num1: 2, num2: 7, context: "2 marbles and you find 7 more marbles" },
        { num1: 4, num2: 6, context: "4 toy cars and you get 6 toy cars as a gift" },
        { num1: 10, num2: 2, context: "10 books and you buy 2 more books" },
        { num1: 3, num2: 3, context: "3 dogs and you adopt 3 more dogs" },
        { num1: 5, num2: 0, context: "5 candies and you buy none" },
        { num1: 4, num2: 1, context: "4 pencils and you add 1 more pencil" }
    ];

    const shuffledExamples = examples.sort(() => 0.5 - Math.random()).slice(0, 5);

    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.maxHeight = '500px';
    container.style.overflowY = 'auto';

    let score = 0;

    shuffledExamples.forEach((example, index) => {
        const { num1, num2, context } = example;

        const exampleDiv = document.createElement('div');
        exampleDiv.style.border = '1px solid black';
        exampleDiv.style.marginBottom = '10px';
        exampleDiv.style.padding = '10px';

        exampleDiv.innerHTML = `
            <strong>Question ${index + 1}:</strong><br>
            ${context}<br>
            What is ${num1} + ${num2}?<br>
            <input type="text" id="answer${index}" placeholder="Your answer" 
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
        `;

        container.appendChild(exampleDiv);
    });

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#3498db';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    cancelButton.style.marginLeft = '10px';

    submitButton.onclick = function() {
        score = 0; // Reset score
        let allAnswered = true; // Flag to check if all questions are answered

        shuffledExamples.forEach((example, index) => {
            const userAnswer = document.getElementById(`answer${index}`).value;
            const correctAnswer = example.num1 + example.num2;
            const exampleDiv = container.children[index];

            if (userAnswer) {
                if (parseInt(userAnswer) === correctAnswer) {
                    score++;
                }
            } else {
                allAnswered = false; // Mark as not all answered
                exampleDiv.style.backgroundColor = '#ffcccc'; // Highlight unanswered question
            }
        });

        if (!allAnswered) {
            alert("Please answer all the questions before submitting.");
        } else {
            const resultMessage = score === shuffledExamples.length 
                ? "Good Work 5/5 *****!"
                : `Your score is ${score} out of ${shuffledExamples.length}`;
            alert(resultMessage);
            container.remove(); // Remove the interface after submission
        }
    };

    cancelButton.onclick = function() {
        container.remove(); // Close the interface
    };

    container.appendChild(submitButton);
    container.appendChild(cancelButton);
    document.body.appendChild(container);
}

// Start the addition test
Additionstructured();

function BoxCountingGame() {
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '80vw';
    container.style.maxHeight = '80vh';
    container.style.overflowY = 'auto'; // Allow vertical scrolling
    container.style.display = 'flex';
    container.style.flexDirection = 'column';
    container.style.alignItems = 'center';

    // Section 1: Question
    const questionDiv = document.createElement('div');
    questionDiv.innerText = "How many boxes do you see in total?";
    container.appendChild(questionDiv);

    // Section 2: Box Container (Horizontal layout)
    const boxContainer = document.createElement('div');
    boxContainer.style.display = 'flex';
    boxContainer.style.flexWrap = 'wrap';  // Allow boxes to wrap to next line if there are too many
    boxContainer.style.justifyContent = 'center';  // Center align the boxes horizontally
    boxContainer.style.marginBottom = '20px'; // Space between boxes and input
    container.appendChild(boxContainer);

    let blueBoxes = 0;
    let redBoxes = 0;
    let totalBoxes = 0;

    function displayBoxes() {
        // Clear previous boxes
        const previousBoxes = boxContainer.querySelectorAll('.box');
        previousBoxes.forEach(box => box.remove());

        // Randomize the number of blue and red boxes
        blueBoxes = Math.floor(Math.random() * 5) + 1; // Random number between 1 and 5
        redBoxes = Math.floor(Math.random() * 5) + 1; // Random number between 1 and 5
        totalBoxes = blueBoxes + redBoxes;

        console.log(`Blue boxes: ${blueBoxes}, Red boxes: ${redBoxes}, Total boxes: ${totalBoxes}`);

        // Create blue boxes
        for (let i = 0; i < blueBoxes; i++) {
            const blueBox = document.createElement('div');
            blueBox.classList.add('box');
            blueBox.style.width = '50px';
            blueBox.style.height = '50px';
            blueBox.style.backgroundColor = 'blue';
            blueBox.style.margin = '10px'; // Horizontal margin for spacing between boxes
            blueBox.style.borderRadius = '5px';
            boxContainer.appendChild(blueBox);
        }

        // Create red boxes
        for (let i = 0; i < redBoxes; i++) {
            const redBox = document.createElement('div');
            redBox.classList.add('box');
            redBox.style.width = '50px';
            redBox.style.height = '50px';
            redBox.style.backgroundColor = 'red';
            redBox.style.margin = '10px'; // Horizontal margin for spacing between boxes
            redBox.style.borderRadius = '5px';
            boxContainer.appendChild(redBox);
        }
    }

    // Section 3: User Input (Positioned below boxes)
    const inputContainer = document.createElement('div');
    inputContainer.style.display = 'flex';
    inputContainer.style.flexDirection = 'column';
    inputContainer.style.alignItems = 'center';
    inputContainer.style.marginTop = '20px';

    const answerInput = document.createElement('input');
    answerInput.type = 'text'; // Use plain text input to avoid number-related UI elements
    answerInput.placeholder = '';
    answerInput.style.marginTop = '10px';
    answerInput.style.fontSize = '18px';
    answerInput.style.padding = '10px';
    answerInput.style.width = '60%';
    answerInput.style.borderRadius = '5px';
    answerInput.style.border = '1px solid #ccc';
    answerInput.style.textAlign = 'center';
    answerInput.style.outline = 'none';
    answerInput.style.webkitAppearance = 'none'; // Remove default styling (e.g., number input spinners)
    answerInput.style.mozAppearance = 'textfield'; // Remove default styling (e.g., number input spinners)
    answerInput.style.userSelect = 'text'; // Ensure it's treated as text input
    inputContainer.appendChild(answerInput);

    // Section 4: Buttons
    const buttonContainer = document.createElement('div');
    buttonContainer.style.display = 'flex';
    buttonContainer.style.marginTop = '20px'; // Space between the input and buttons

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#2ecc71'; // Green background
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    cancelButton.style.marginLeft = '10px'; // Space between the buttons

    buttonContainer.appendChild(submitButton);
    buttonContainer.appendChild(cancelButton);
    inputContainer.appendChild(buttonContainer);

    // Append input and buttons to container
    container.appendChild(inputContainer);

    submitButton.onclick = function() {
        const userAnswer = parseInt(answerInput.value);
        console.log(`User answer: ${userAnswer}`);
        if (userAnswer === totalBoxes) {
            alert("Correct! You counted all the boxes!");
        } else {
            alert(`Incorrect! There were ${totalBoxes} boxes in total.`);
        }

        // Clear the input after submission
        answerInput.value = '';

        // Start a new round of boxes after a brief delay
        setTimeout(() => {
            displayBoxes();
        }, 1000); // Delay to allow user to see the alert before the new boxes appear
    };

    cancelButton.onclick = function() {
        // Close the container when cancel is clicked
        container.style.display = 'none';
    };

    // Start by displaying the boxes after a brief delay
    setTimeout(displayBoxes, 500); // Delay to allow question text to be visible first
    document.body.appendChild(container);
}

// Start the box counting game
BoxCountingGame();

function balloonPoppingGame() {
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.height = '80vh';
    container.style.overflow = 'auto';

    document.body.appendChild(container);

    const balloonContainer = document.createElement('div');
    balloonContainer.style.position = 'relative';
    balloonContainer.style.width = '100%';
    balloonContainer.style.height = '70%';
    balloonContainer.style.marginTop = '20px'; 
    container.appendChild(balloonContainer);

    const questionDiv = document.createElement('div');
    container.appendChild(questionDiv);

    const answerInput = document.createElement('input');
    answerInput.type = 'text';
    answerInput.placeholder = 'Remaining balloons';
    answerInput.style.marginTop = '10px';
    container.appendChild(answerInput);

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#4CAF50';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';
    container.appendChild(submitButton);

    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#f44336';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    cancelButton.style.marginTop = '10px';
    container.appendChild(cancelButton);

    let totalBalloons, balloonsToPop, remainingBalloons, poppedCount = 0;

    const popSound = new Audio('https://www.soundjay.com/button/beep-07.wav'); // Replace with a valid sound file URL

    function generateCenteredPosition(index, totalBalloons) {
        const maxColumns = 3;
        const maxRows = Math.ceil(totalBalloons / maxColumns);
        const balloonWidth = 100;
        const balloonHeight = 100;
        const margin = 10;
        const spaceBetween = (window.innerWidth * 0.75 - (maxColumns * balloonWidth)) / (maxColumns + 1);

        const column = index % maxColumns;
        const row = Math.floor(index / maxColumns);
        const xPos = spaceBetween + column * (balloonWidth + spaceBetween);
        const yPos = (window.innerHeight * 0.7 - (maxRows * balloonHeight)) / 2 + row * (balloonHeight + margin);

        return { x: xPos, y: yPos };
    }

    function resetGame() {
        balloonContainer.innerHTML = '';
        poppedCount = 0;

        totalBalloons = Math.floor(Math.random() * 5) + 3;
        balloonsToPop = Math.floor(Math.random() * (totalBalloons - 2)) + 1;

        remainingBalloons = totalBalloons - balloonsToPop;
        questionDiv.innerText = `You have ${totalBalloons} balloons. How many balloons will you have? (Pop ${balloonsToPop})`;

        for (let i = 0; i < totalBalloons; i++) {
            setTimeout(() => {
                const balloon = document.createElement('img');
                balloon.src = 'WhatsApp Image 2024-11-05 at 11.36.51@1.25x.png'; // Replace with a valid balloon image URL
                balloon.style.position = 'absolute';
                balloon.style.width = '100px';
                balloon.style.cursor = 'pointer';
                balloon.style.transition = 'transform 0.2s';

                const position = generateCenteredPosition(i, totalBalloons);
                balloon.style.left = `${position.x}px`;
                balloon.style.top = `${position.y}px`;
                balloon.style.animation = `float ${Math.random() * 5 + 2}s ease-in infinite`;

                balloon.addEventListener('click', popBalloon);
                balloonContainer.appendChild(balloon);
            }, i * 200); // Delay each balloon's appearance by 200ms
        }
    }

    function popBalloon(event) {
        const balloon = event.target;
        popSound.play();
        balloon.style.transition = 'transform 0.2s';
        balloon.style.transform = 'scale(0)';

        setTimeout(() => {
            balloon.remove();
        }, 200);

        poppedCount++;
        if (poppedCount >= balloonsToPop) {
            setTimeout(() => alert("You've popped all the balloons! Now, how many remain?"), poppedCount * 200);
            answerInput.value = '';
            answerInput.focus();
        }
    }

    submitButton.onclick = function () {
        const userAnswer = parseInt(answerInput.value);
        if (userAnswer === remainingBalloons) {
            showCongratsMessage();
        } else {
            alert(`Incorrect! There are ${remainingBalloons} balloons remaining.`);
        }
    };

    function showCongratsMessage() {
        const congratsMessage = document.createElement('div');
        congratsMessage.innerText = 'Congrats! Try the next one.';
        congratsMessage.style.position = 'absolute';
        congratsMessage.style.top = '20%';
        congratsMessage.style.left = '50%';
        congratsMessage.style.transform = 'translateX(-50%)';
        congratsMessage.style.fontSize = '24px';
        congratsMessage.style.fontWeight = 'bold';
        congratsMessage.style.color = '#4CAF50';
        congratsMessage.style.animation = 'float 3s ease-in-out forwards';
        container.appendChild(congratsMessage);

        setTimeout(() => {
            congratsMessage.remove();
            resetGame();
        }, 3000);
    }

    cancelButton.onclick = function () {
        container.style.display = 'none';
    };

    resetGame();

    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
}

balloonPoppingGame();

function diceGame() {
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px';
    container.style.margin = 'auto';
    container.style.padding = '20px';
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '1000';
    container.style.width = '75vw';
    container.style.height = '80vh';
    container.style.overflow = 'auto';

    document.body.appendChild(container);

    const diceContainer = document.createElement('div');
    diceContainer.style.display = 'flex';
    diceContainer.style.justifyContent = 'center'; // Align dice in the center
    diceContainer.style.alignItems = 'center';
    diceContainer.style.position = 'relative';
    diceContainer.style.width = '100%';
    diceContainer.style.height = '70%';
    diceContainer.style.marginTop = '20px'; 
    container.appendChild(diceContainer);

    const questionDiv = document.createElement('div');
    container.appendChild(questionDiv);

    const answerInput = document.createElement('input');
    answerInput.type = 'text';
    answerInput.placeholder = 'Enter total sum';
    answerInput.style.marginTop = '10px';
    container.appendChild(answerInput);

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#4CAF50';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';
    container.appendChild(submitButton);

    const cancelButton = document.createElement('button');
    cancelButton.innerText = 'Cancel';
    cancelButton.style.fontSize = '16px';
    cancelButton.style.backgroundColor = '#f44336';
    cancelButton.style.color = 'white';
    cancelButton.style.border = 'none';
    cancelButton.style.borderRadius = '5px';
    cancelButton.style.padding = '10px 15px';
    cancelButton.style.cursor = 'pointer';
    cancelButton.style.marginTop = '10px';
    container.appendChild(cancelButton);

    const progressContainer = document.createElement('div');
    progressContainer.style.marginTop = '20px';
    progressContainer.style.width = '100%';
    progressContainer.style.height = '20px';
    progressContainer.style.backgroundColor = '#f0f0f0';
    progressContainer.style.borderRadius = '10px';
    progressContainer.style.overflow = 'hidden';
    container.appendChild(progressContainer);

    const progressBar = document.createElement('div');
    progressBar.style.height = '100%';
    progressBar.style.backgroundColor = '#4CAF50';
    progressBar.style.width = '0%';
    progressContainer.appendChild(progressBar);

    const progressText = document.createElement('div');
    progressText.style.fontSize = '18px';
    progressText.style.marginTop = '5px';
    progressText.style.fontWeight = 'bold';
    progressText.innerText = 'Progress: 0%';
    container.appendChild(progressText);

    let dice1, dice2, totalSum, dice1Spun = false, dice2Spun = false;
    let progress = 0;

    const rollSound = new Audio('https://www.soundjay.com/button/beep-07.wav'); // Dice spin sound

    function resetGame() {
        diceContainer.innerHTML = '';
        dice1Spun = false;
        dice2Spun = false;

        // Reset dice numbers and question
        questionDiv.innerText = `Click to spin the dice! After spinning, enter the total sum of the dice.`;

        createDice('Dice 1');
        createDice('Dice 2');
    }

    function createDice(diceName) {
        const dice = document.createElement('div');
        dice.style.width = '80px';
        dice.style.height = '80px';
        dice.style.backgroundColor = '#4CAF50'; // Change dice color to green
        dice.style.borderRadius = '10px';
        dice.style.display = 'flex';
        dice.style.alignItems = 'center';
        dice.style.justifyContent = 'center';
        dice.style.margin = '10px';
        dice.style.fontSize = '32px';
        dice.style.fontWeight = 'bold';
        dice.style.color = 'white'; // White text for better visibility
        dice.innerText = 'Spin me!';
        dice.style.cursor = 'pointer';
        dice.style.transition = 'transform 1s ease-in-out';

        dice.addEventListener('click', function() {
            spinDice(dice);
        });

        diceContainer.appendChild(dice);
    }

    function spinDice(dice) {
        dice.style.transform = 'rotate(720deg)';
        rollSound.play(); // Play sound when dice spin
        setTimeout(() => {
            const randomValue = Math.floor(Math.random() * 6) + 1;
            dice.innerText = randomValue;

            // Update the respective dice spun status and calculate the sum
            if (dice === diceContainer.children[0]) {
                dice1 = randomValue;
                dice1Spun = true;
            } else {
                dice2 = randomValue;
                dice2Spun = true;
            }

            // Calculate the total sum once both dice are spun
            if (dice1Spun && dice2Spun) {
                totalSum = dice1 + dice2;
            }
        }, 1000); // After the spin ends, show the number
    }

    submitButton.onclick = function () {
        if (!dice1Spun || !dice2Spun) {
            alert("Please spin both dice first!");
            return;
        }

        const userAnswer = parseInt(answerInput.value);
        if (userAnswer === totalSum) {
            progress += 20; // Increase progress by 20% on correct answer
            if (progress >= 100) {
                showChampionMessage();
            } else {
                updateProgressBar();
            }
            resetGame(); // Reset the game after a correct answer
        } else {
            progress = 0; // Reset progress to 0 on incorrect answer
            updateProgressBar();
            alert(`Incorrect! The correct sum is ${totalSum}.`);
        }
    };

    function updateProgressBar() {
        progressBar.style.width = `${progress}%`;
        progressText.innerText = `Progress: ${progress}%`; // Update progress text
    }

    function showChampionMessage() {
        const championMessage = document.createElement('div');
        championMessage.innerText = 'Champion! Congratulations!';
        championMessage.style.position = 'absolute';
        championMessage.style.top = '20%';
        championMessage.style.left = '50%';
        championMessage.style.transform = 'translateX(-50%)';
        championMessage.style.fontSize = '24px';
        championMessage.style.fontWeight = 'bold';
        championMessage.style.color = '#FFD700';
        championMessage.style.animation = 'float 3s ease-in-out forwards';
        container.appendChild(championMessage);

        setTimeout(() => {
            championMessage.remove();
            progress = 0; // Reset progress after champion message
            updateProgressBar();
        }, 3000);
    }

    cancelButton.onclick = function () {
        container.style.display = 'none';
    };

    resetGame();

    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
}

diceGame();



