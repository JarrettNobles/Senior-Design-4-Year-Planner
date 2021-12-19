//this is be the object shape for storing the classes

const shuffledQuestions = [
    {
        question: "Semester 1",
        optionA: "CSC 204",
        optionB: "IST 126",
        optionC: "MAT 191",
        optionD: "INT 101",
    },

    {
        question: "Semester 2",
        optionA: "CSC 205",
        optionB: "IST 222",
        optionC: "MAT 192",
        optionD: "PSY 101",
    },
    
    {
        question: "Semester 3",
        optionA: "CSC 245",
        optionB: "IST 220",
        optionC: "INT 201",
        optionD: "STA 126",
    },

	{
        question: "Semester 4",
        optionA: "PSY 394",
        optionB: "IST 276",
        optionC: "STA 340",
        optionD: "CYS 223",
    },

    {
        question: "Semester 5",
        optionA: "CSC 322",
        optionB: "CHM 111",
        optionC: "IST 221",
        optionD: "PSY 215",
    },
    
    {
        question: "Semester 6",
        optionA: "IST 321",
        optionB: "IST 222",
        optionC: "STA 330",
        optionD: "INT 301",
    },

	{
        question: "Semester 7",
        optionA: "CYS 305",
        optionB: "IST 470",
        optionC: "STA 227",
        optionD: "PYS 270",
    },

    {
        question: "Semester 8",
        optionA: "CSC 323",
        optionB: "CYS 321",
        optionC: "HIS 101",
        optionD: "CHM 112",
    }

]

let choices = [] //empty array to hold class choices

let indexNumber = 0 //will be used in displaying next question

// function for displaying next question in the array to dom
//also handles displaying players and quiz information to dom
function NextQuestion(index) {
    const currentQuestion = shuffledQuestions[index]
    document.getElementById("display-question").innerHTML = currentQuestion.question;
    document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
    document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
    document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
    document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;

}


function checkForAnswer() {
    const currentQuestion = shuffledQuestions[indexNumber] //gets current Question 
    const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
    const labels = document.getElementsByName("label");

    //checking to make sure a radio input has been checked or an option being chosen
    if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
        document.getElementById('option-modal').style.display = "flex"
    }
    
    //add radio input to choices array
    //options.forEach((option) => {
    //    if (option.checked) {
    //        cool = option.innerHTML
    //        //choices[indexNumber] = "Semester" + (indexNumber + 1)
    //        choices[indexNumber] = cool
    //        indexNumber++ //adding 1 to index so has to display next question..
    //    }
    
    for (let i = 0; i < options.length; i++) {
        if (options[i].checked) {
            choices[indexNumber] = " " + labels[i].innerHTML
            indexNumber++
        }
    }

    //})
}



//called when the next button is called
function handleNextQuestion() {
    checkForAnswer() //check if player picked right or wrong option
    unCheckRadioButtons()
    if (indexNumber <= 7) {
        //displays next question as long as index number isn't greater than 7, remember index number starts from 0, so index 7 is question 8
        NextQuestion(indexNumber)
    }
    else {
        handleEndGame()//ends game if index number greater than 7 meaning we're already at the 8th question
    }
    resetOptionBackground()
}

//sets options background back to null after display the right/wrong colors
function resetOptionBackground() {
    const options = document.getElementsByName("option");
    options.forEach((option) => {
        document.getElementById(option.labels[0].id).style.backgroundColor = ""
    })
}

// unchecking all radio buttons for next question(can be done with map or foreach loop also)
function unCheckRadioButtons() {
    const options = document.getElementsByName("option");
    for (let i = 0; i < options.length; i++) {
        options[i].checked = false;
    }
}

// function for when all questions being answered
function handleEndGame() {
    let remark = null
    let remarkColor = null

    // condition check for player remark and remark color
    remark = choices
    remarkColor = "paleturquoise"
    
    //data to display to score board
    document.getElementById('remarks').innerHTML = remark
    document.getElementById('remarks').style.color = remarkColor
    document.getElementById('score-modal').style.display = "flex"

}

//closes score modal, resets game and reshuffles questions
function closeScoreModal() {
    indexNumber = 0
    NextQuestion(indexNumber)
    document.getElementById('score-modal').style.display = "none"
    window.location = "index.php"
}

//function to close warning modal
function closeOptionModal() {
    document.getElementById('option-modal').style.display = "none"
}
