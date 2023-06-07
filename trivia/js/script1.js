
const l = localStorage.getItem('level');
const c = localStorage.getItem('categorie');
let x
if(l=="easy"){x=10}else{if(l=="medium"){x=20}else{x=30}};
 async function get() {
    const url = "https://opentdb.com/api.php?amount=5&category="+c+"&difficulty="+l+"&type=multiple";
    console.log(url);
    const response = await fetch(url);
     const result = await response.json();
     console.log(result);
let questions = [
    {
    numb: 1,
    question: result.results[0].question,
    answer: result.results[0].correct_answer,
    options: [result.results[0].correct_answer, result.results[0].incorrect_answers[0],result.results[0].incorrect_answers[1],result.results[0].incorrect_answers[2]   ]
  },
    {
    numb: 2,
    question: result.results[1].question,
    answer: result.results[1].correct_answer,
    options: [result.results[1].correct_answer, result.results[1].incorrect_answers[0],result.results[1].incorrect_answers[1],result.results[1].incorrect_answers[2]   ]
  },
    {
    numb: 3,
    question: result.results[2].question,
    answer: result.results[2].correct_answer,
    options: [result.results[2].correct_answer, result.results[2].incorrect_answers[0],result.results[2].incorrect_answers[1],result.results[2].incorrect_answers[2]   ]
  },
    {
    numb: 4,
    question: result.results[3].question,
    answer: result.results[3].correct_answer,
    options: [result.results[3].correct_answer, result.results[3].incorrect_answers[0],result.results[3].incorrect_answers[1],result.results[3].incorrect_answers[2]   ]
  },
    {
    numb: 5,
    question: result.results[4].question,
    answer: result.results[4].correct_answer,
    options: [result.results[4].correct_answer, result.results[4].incorrect_answers[0],result.results[4].incorrect_answers[1],result.results[4].incorrect_answers[2]   ]
  }
];
let audio = new Audio('my_audio_file.wav');

const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); 
}
continue_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); 
    quiz_box.classList.add("activeQuiz"); 
    showQuetions(0); 
    queCounter(1); 
    startTimer(15); 
    startTimerLine(0); 
}

let timeValue =  15;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;

const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");





const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

next_btn.onclick = ()=>{
    if(que_count < questions.length - 1){ 
        que_count++; 
        que_numb++; 
        showQuetions(que_count); 
        queCounter(que_numb); 
        clearInterval(counter); 
        clearInterval(counterLine); 
        startTimer(timeValue); 
        startTimerLine(widthValue); 
        timeText.textContent = "Time Left"; 
        next_btn.classList.remove("show"); 
    }else{
        clearInterval(counter); 
        clearInterval(counterLine); 
        showResult(); 
    }
}

function showQuetions(index){
    const que_text = document.querySelector(".que_text");

    let que_tag = '<span>'+ questions[index].numb + ". " + questions[index].question +'</span>';
    let option_tag = '<div class="option"><span>'+ getRandomItem(questions[index].options) +'</span></div>'
    + '<div class="option"><span>'+ getRandomItem(questions[index].options) +'</span></div>'
    + '<div class="option"><span>'+ getRandomItem(questions[index].options) +'</span></div>'
    + '<div class="option"><span>'+ getRandomItem(questions[index].options) +'</span></div>';
    que_text.innerHTML = que_tag; 
    option_list.innerHTML = option_tag; 
    
    const option = option_list.querySelectorAll(".option");
    console.log(option.length);
    for(i=0; i < option.length; i++){
        option[i].addEventListener("click",function(){
            optionSelected(this);
        });
    }
}

let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';


function optionSelected(answer){
    clearInterval(counter);
    clearInterval(counterLine); 
    let userAns = answer.textContent; 
    let correcAns = questions[que_count].answer; 
    const allOptions = option_list.children.length; 
    audio.pause();
    if(userAns == correcAns){ 
        userScore += 1; 
        answer.classList.add("correct"); 
        answer.insertAdjacentHTML("beforeend", tickIconTag); 
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore);
    }else{
        answer.classList.add("incorrect"); 
        answer.insertAdjacentHTML("beforeend", crossIconTag); 
        console.log("Wrong Answer");

        for(i=0; i < allOptions; i++){
            if(option_list.children[i].textContent == correcAns){  
                option_list.children[i].setAttribute("class", "option correct");
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                console.log("Auto selected correct answer.");
            }
        }
    }
    for(i=0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled"); 
    }
    next_btn.classList.add("show"); 
}

function showResult(){
    info_box.classList.remove("activeInfo"); 
    quiz_box.classList.remove("activeQuiz"); 
    result_box.classList.add("activeResult"); 
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3){ 
        let scoreTag = '<span>and congrats! , You got <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;  
    }
    else if(userScore > 1){ 
        let scoreTag = '<span>and nice , You got <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
    else{ 
        let scoreTag = '<span>and sorry , You got only <p>'+ userScore +'</p> out of <p>'+ questions.length +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
    console.log("teste");
exit_btn.onclick = ()=>{
    console.log("teste");
    let score = Number(getCookie("score"));
    score=(Number(score)*x)+Number(userScore);
    document.cookie = "score="+score+"; path=/";
    window.location.href = "http://localhost/livescore/index.php";
}
    
    quit_quiz.onclick = ()=>{
        console.log("teste");
        let score = getCookie("score");
        score=(Number(score)*x)+Number(userScore);
        document.cookie = "score="+score+"; path=/";
        window.location.href = "http://localhost/livescore/index.php";
    
    }

restart_quiz.onclick = ()=>{
    quiz_box.classList.add("activeQuiz"); 
    result_box.classList.remove("activeResult"); 
    timeValue = 15; 
    que_count = 0;
    que_numb = 1;
    userScore = 0;
    widthValue = 0;
    showQuetions(que_count); 
    queCounter(que_numb); 
    clearInterval(counter); 
    clearInterval(counterLine); 
    startTimer(timeValue); 
    startTimerLine(widthValue); 
    timeText.textContent = "Time Left"; 
    next_btn.classList.remove("show"); 
    let score = getCookie("score");
    score=(score*x)+userScore;
    document.cookie = "score="+score+"; path=/";
}
}

function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        timeCount.textContent = time; 
        time--; 
        audio.play();
        if(time < 9){ 
            let addZero = timeCount.textContent; 
            timeCount.textContent = "0" + addZero;
        }
        if(time < 0){ 
            audio.pause();
            clearInterval(counter); 
            timeText.textContent = "Time Off"; 
            const allOptions = option_list.children.length; 
            let correcAns = questions[que_count].answer; 
            for(i=0; i < allOptions; i++){
                if(option_list.children[i].textContent == correcAns){ 
                    option_list.children[i].setAttribute("class", "option correct"); 
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); 
            }
            next_btn.classList.add("show"); 
        }
    }
}

function startTimerLine(time){
    counterLine = setInterval(timer, 29);
    function timer(){
        time += 1; 
        time_line.style.width = time + "px"; 
        if(time > 549){ 
            clearInterval(counterLine); 
        }
    }
}

function queCounter(index){

    let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ questions.length +'</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  
}
function getRandomItem(arr) {

    const randomIndex = Math.floor(Math.random() * arr.length);
    const item = arr[randomIndex];
    arr.splice(randomIndex,1);
    return item;
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
}

get();
 