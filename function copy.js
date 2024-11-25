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
  
    // Shuffle the examples to get random selections
    const shuffledExamples = examples.sort(() => 0.5 - Math.random()).slice(0, 5);
  
    // Create a container for the interface
    const container = document.createElement('div');
    container.style.backgroundColor = 'white';
    container.style.textAlign = 'center';
    container.style.fontSize = '18px'; // Font size
    container.style.margin = 'auto'; // Center the container
    container.style.padding = '20px'; // Increased padding
    container.style.borderRadius = '10px';
    container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
    container.style.position = 'fixed';
    container.style.top = '50%'; // Center vertically
    container.style.left = '50%'; // Center horizontally
    container.style.transform = 'translate(-50%, -50%)'; // Adjust positioning
    container.style.zIndex = '1000';
    container.style.width = '75vw'; // Set width to 75% of the viewport width
    container.style.maxHeight = '500px'; // Increased max height
    container.style.overflowY = 'auto'; // Enable vertical scrolling
  
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
        
        // Add a border or underline after each example
        const separator = document.createElement('hr'); // Creates a horizontal line
        separator.style.border = '1px solid #ccc'; // Light gray color for the line
        exampleDiv.appendChild(separator);
  
        container.appendChild(exampleDiv);
    }
  
    // Create a close button
    const closeButton = document.createElement('button');
    closeButton.innerText = 'Close';
    closeButton.style.fontSize = '16px'; // Button font size
    closeButton.style.backgroundColor = '#e74c3c';
    closeButton.style.color = 'white';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '5px';
    closeButton.style.padding = '10px 15px'; // Increased button padding
    closeButton.style.cursor = 'pointer';
  
    closeButton.onclick = function() {
        container.remove(); // Remove the explanations
    };
  
    container.appendChild(closeButton);
    document.body.appendChild(container);
  }
  
  // Start the explanation
  explainAddition();

function explainSubtraction() {
  const examples = [
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

  // Shuffle the examples to get random selections
  const shuffledExamples = examples.sort(() => 0.5 - Math.random()).slice(0, 5);

  // Create a container for the interface
  const container = document.createElement('div');
  container.style.backgroundColor = 'white';
  container.style.textAlign = 'center';
  container.style.fontSize = '18px'; // Font size
  container.style.margin = 'auto'; // Center the container
  container.style.padding = '20px'; // Increased padding
  container.style.borderRadius = '10px';
  container.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
  container.style.position = 'fixed';
  container.style.top = '50%'; // Center vertically
  container.style.left = '50%'; // Center horizontally
  container.style.transform = 'translate(-50%, -50%)'; // Adjust positioning
  container.style.zIndex = '1000';
  container.style.width = '75vw'; // Set width to 75% of the viewport width
  container.style.maxHeight = '500px'; // Increased max height
  container.style.overflowY = 'auto'; // Enable vertical scrolling

  for (let i = 0; i < shuffledExamples.length; i++) {
      const { num1, num2, context } = shuffledExamples[i];
      const correctAnswer = num1 - num2;

      const exampleDiv = document.createElement('div');
      exampleDiv.innerHTML = `
          <strong>Example ${i + 1}:</strong><br>
          We have ${num1} and we want to subtract ${num2}.<br>
          This means:<br>
          ${num1} - ${num2} means we are starting with ${context}.<br>
          So, the total left is ${correctAnswer}.<br>
      `;
      
      // Add a border or underline after each example
      const separator = document.createElement('hr'); // Creates a horizontal line
      separator.style.border = '1px solid #ccc'; // Light gray color for the line
      exampleDiv.appendChild(separator);

      container.appendChild(exampleDiv);
  }

  // Create a close button
  const closeButton = document.createElement('button');
  closeButton.innerText = 'Close';
  closeButton.style.fontSize = '16px'; // Button font size
  closeButton.style.backgroundColor = '#e74c3c';
  closeButton.style.color = 'white';
  closeButton.style.border = 'none';
  closeButton.style.borderRadius = '5px';
  closeButton.style.padding = '10px 15px'; // Increased button padding
  closeButton.style.cursor = 'pointer';

  closeButton.onclick = function() {
      container.remove(); // Remove the explanations
  };

  container.appendChild(closeButton);
  document.body.appendChild(container);
}

// Start the explanation
explainSubtraction();


function Additiontest() {
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
        const correctAnswer = num1 + num2;

        const exampleDiv = document.createElement('div');
        exampleDiv.style.border = '1px solid black';
        exampleDiv.style.marginBottom = '10px';
        exampleDiv.style.padding = '10px';

        exampleDiv.innerHTML = `
            <strong>Question ${index + 1}:</strong><br>
            ${context}<br>
            What is ${num1} + ${num2}?<br>
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

        if (!allAnswered) {
            alert("Please answer all the questions before submitting.");
        } else {
            const resultMessage = score === shuffledExamples.length 
                ? "Good Work 5/5  *****!"
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
Additiontest();

function Subtractiontest() {
    const examples = [
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
        const correctAnswer = num1 - num2;

        const exampleDiv = document.createElement('div');
        exampleDiv.style.border = '1px solid black';
        exampleDiv.style.marginBottom = '10px';
        exampleDiv.style.padding = '10px';

        exampleDiv.innerHTML = `
            <strong>Question ${index + 1}:</strong><br>
            ${context}<br>
            What is ${num1} - ${num2}?<br>
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
            const selectedAnswer = document.querySelector(`input[name="question${index}"]:checked`);
            const exampleDiv = container.children[index];

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
            const resultMessage = score === shuffledExamples.length 
                ? "Good work! Your score is 5/5!"
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

// Start the subtraction test
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
        { num1: 10, num2: 4, context: "10 stickers - 4 stickers", operation: "subtract", answers: [5, 6, 4] },
        { num1: 8, num2: 3, context: "8 balloons - 3 balloons", operation: "subtract", answers: [5, 6, 7] },
        { num1: 15, num2: 7, context: "15 candies - 7 candies", operation: "subtract", answers: [8, 7, 9] },
        { num1: 12, num2: 5, context: "12 apples - 5 apples", operation: "subtract", answers: [6, 7, 8] },
        { num1: 9, num2: 3, context: "9 dogs - 3 dogs", operation: "subtract", answers: [5, 6, 7] }
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

        // if(totalScore>4){
        //     comment = "Excellent";
        // }else if(totalScore === 4){
        //     comment = "Good job";
        // }else if(totalScore ===3){
        //     comment = "Well tried";
        // }
        // else if(totalScore ===2){
        //     comment = "Do better";
        // }
        // else if(totalScore ===1){
        //     comment = "Work hard";
        // }
        // else{
        //     comment = "Put more effort";
        // }
    
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

    const questionInput = document.createElement('input');
    questionInput.type = 'text';
    questionInput.placeholder = 'Ask a math question (e.g., 5 + 3 or 10 - 4)';
    questionInput.style.width = '70%';
    questionInput.style.margin = '5px';

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Get Answer';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';

    const explanationDiv = document.createElement('div');
    explanationDiv.id = 'explanation';
    explanationDiv.style.marginTop = '20px';

    submitButton.onclick = function () {
        const question = questionInput.value.trim();
        const match = question.match(/^(\d+)\s*([\+\-])\s*(\d+)$/); // Match valid addition or subtraction

        if (match) {
            const num1 = parseInt(match[1]);
            const operator = match[2];
            const num2 = parseInt(match[3]);
            let result;
            let explanation;

            if (operator === '+') {
                result = num1 + num2;
                explanation = `To solve ${num1} + ${num2}, we add the two numbers together. The result is ${result}.`;
            } else if (operator === '-') {
                result = num1 - num2;
                explanation = `To solve ${num1} - ${num2}, we subtract ${num2} from ${num1}. The result is ${result}.`;
            }

            explanationDiv.innerHTML = `
                <strong>Question:</strong> ${question}<br>
                <strong>Answer:</strong> ${result}<br>
                <strong>Explanation:</strong> ${explanation}
            `;
        } else {
            explanationDiv.innerHTML = `<span style="color: red;">Please enter a valid addition or subtraction question (e.g., 5 + 3 or 10 - 4).</span>`;
        }
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

function DuckMovementQuestion() {
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
    container.style.height = '200px';
    container.style.overflow = 'hidden';

    const questionDiv = document.createElement('div');
    questionDiv.innerText = "How many ducks moved from left to right?";
    container.appendChild(questionDiv);

    const answerInput = document.createElement('input');
    answerInput.type = 'text';
    answerInput.placeholder = 'Your answer';
    answerInput.style.marginTop = '10px';
    container.appendChild(answerInput);

    const submitButton = document.createElement('button');
    submitButton.innerText = 'Submit';
    submitButton.style.fontSize = '16px';
    submitButton.style.backgroundColor = '#e74c3c';
    submitButton.style.color = 'white';
    submitButton.style.border = 'none';
    submitButton.style.borderRadius = '5px';
    submitButton.style.padding = '10px 15px';
    submitButton.style.cursor = 'pointer';
    container.appendChild(submitButton);

    let duckCount = 0;

    // Load sound
    const quackSound = new Audio('Duck_Quack_-_Sound_Effect__HD_(128k).m4a'); // Replace with a valid quack sound URL

    function animateDucks() {
        // Randomize the number of ducks between 3 and 7
        duckCount = Math.floor(Math.random() * 5) + 3; 

        for (let i = 0; i < duckCount; i++) {
            const duck = document.createElement('img');
            duck.src = 'duck.png'; // Replace with a valid duck image URL
            duck.style.position = 'absolute';
            duck.style.width = '50px';
            duck.style.left = `${i * 12}vw`; // Reduced space between ducks
            duck.style.bottom = '20px';
            container.appendChild(duck);
        }

        // Start the animation for all ducks at once
        setTimeout(() => {
            const ducks = container.getElementsByTagName('img');
            for (let duck of ducks) {
                duck.style.transition = 'transform 8s linear'; // Slower movement
                duck.style.transform = 'translateX(100vw)';
                quackSound.play(); // Play sound for each duck
            }
        }, 100); // Short delay to ensure visibility
    }

    submitButton.onclick = function() {
        const userAnswer = parseInt(answerInput.value);
        if (userAnswer === duckCount) {
            alert("Correct! You counted all the ducks moving!");
        } else {
            alert(`Incorrect! There were ${duckCount} ducks that moved.`);
        }
        // Reset for the next round
        answerInput.value = '';
        container.innerHTML = ''; // Clear container
        container.appendChild(questionDiv);
        container.appendChild(answerInput);
        container.appendChild(submitButton);
        animateDucks(); // Start next round
    };

    // Start the animation
    animateDucks();
    document.body.appendChild(container);
}

// Start the duck movement question
DuckMovementQuestion();

