<?php
require 'typing_test.php';
?>
<html>
  <script>
const paragraphs = [
  "He knew it was going to be a bad day when he saw mountain lions roaming the streets.The teens wondered what was kept in the red shed on the far edge of the school grounds. You have no right to call yourself creative until you look at a trowel and think that it would make a great lockpick.As you consider all the possible ways to improve yourself and the world, you notice John Travolta seems fairly unhappy.",
  "Harrold felt confident that nobody would ever suspect his spy pigeon.She wondered what his eyes were saying beneath his mirrored sunglasses.You should never take advice from someone who thinks red paint dries quicker than blue paint.Each person who knows you has a different perception of who you are. The tour bus was packed with teenage girls heading toward their next adventure.He decided that the time had come to be stronger than any of the excuses he'd used until then. You're good at English when you know the difference between a man eating chicken and a man-eating chicken.He is good at eating pickles and telling women about his emotional problems.",
  "I was very proud of my nickname throughout high school but today- I couldn’t be any different to what my nickname was. Had he known what was going to happen, he would have never stepped into the shower.Buried deep in the snow, he hoped his batteries were fresh in his avalanche beacon.It was that terrifying feeling you have as you tightly hold the covers over you with the knowledge that there is something hiding under your bed. You want to look, but you don't at the same time. You're frozen with fear and unable to act. That's where she found herself and she didn't know what to do next",
  "She had been told time and time again that the most important steps were the first and the last. It was something that she carried within her in everything she did, but then he showed up and disrupted everything. He told her that she had it wrong. The first step wasn't the most important. The last step wasn't the most important. It was the next step that was the most important.",
  "Terrance knew that sometimes it was simply best to stay out of it. He kept repeating this to himself as he watched the scene unfold. He knew that nothing good would come of him getting involved. It was far better for him to stay on the sidelines and observe. He kept yelling this to himself inside his head as he walked over to the couple and punched the man in the face.",
  "The water rush down the wash and into the slot canyon below. Two hikers had started the day to sunny weather without a cloud in the sky, but they hadn't thought to check the weather north of the canyon. Huge thunderstorms had brought a deluge o rain and produced flash floods heading their way. The two hikers had no idea what was coming. Twenty-five hours had passed since the incident. It seemed to be a lot longer than that. That twenty-five hours seemed more like a week in her mind. The fact that she still was having trouble comprehending exactly what took place wasn't helping the matter. She thought if she could just get a little rest the entire incident might make a little more sense.",
  "An aunt is a bassoon from the right perspective. As far as we can estimate, some posit the melic myanmar to be less than kutcha. One cannot separate foods from blowzy bows. The scampish closet reveals itself as a sclerous llama to those who look. A hip is the skirt of a peak. Some hempy laundries are thought of simply as orchids. A gum is a trumpet from the right perspective. A freebie flight is a wrench of the mind. Some posit the croupy.",
  "A baby is a shingle from the right perspective. Before defenses, collars were only operations. Bails are gleesome relatives. An alloy is a streetcar's debt. A fighter of the scarecrow is assumed to be a leisured laundry. A stamp can hardly be considered a peddling payment without also being a crocodile. A skill is a meteorology's fan. Their scent was, in this moment, a hidden feeling. The competitor of a bacon becomes a boxlike cougar.",
  "A broadband jam is a network of the mind. One cannot separate chickens from glowing periods. A production is a faucet from the right perspective. The lines could be said to resemble zincoid females. A deborah is a tractor's whale. Cod are elite japans. Some posit the wiglike norwegian to be less than plashy. A pennoned windchime's burst comes with it the thought that the printed trombone is a supply. Relations are restless tests.",
  "In recent years, some teeming herons are thought of simply as numbers. Nowhere is it disputed that an unlaid fur is a marble of the mind. Far from the truth, few can name a glossy lier that isn't an ingrate bone. The chicken is a giraffe. They were lost without the abscessed leek that composed their fowl. An interviewer is a tussal bomb. Vanward maracas show us how scarfs can be doubts. Few can name an unguled punch that isn't pig.",
  "Betty decided to write a short story and she was sure it was going to be amazing. She had already written it in her head and each time she thought about it she grinned from ear to ear knowing how wonderful it would be. She could imagine the accolades coming in and the praise she would receive for creating such a wonderful piece. She was therefore extremely frustrated when she actually sat down to write the short story and the story that was so beautiful inside her head refused to come out that way on paper.",
  "This could be, or perhaps few can name a pasteboard quiver that isn't a brittle alligator. A swordfish is a death's numeric. Authors often misinterpret the mist as a swelling asphalt, when in actuality it feels more like a crosswise closet. Some posit the tonal brother-in-law to be less than newborn. We know that the sizes could be said to resemble sleepwalk cycles. Before seasons, supplies were only fighters. Their stew was, in this moment.",
  "The vision of an attempt becomes a lawny output. Dibbles are mis womens. The olden penalty reveals itself as a bustled field to those who look. Few can name a chalky force that isn't a primate literature. However, they were lost without the gamy screen that composed their beret. Nowhere is it disputed that a step-uncle is a factory from the right perspective. One cannot separate paints from dreary windows. What we don't know for sure is whether.",
  "She was in a hurry. Not the standard hurry when you're in a rush to get someplace, but a frantic hurry. The type of hurry where a few seconds could mean life or death. She raced down the road ignoring speed limits and weaving between cars. She was only a few minutes away when traffic came to a dead standstill on the road ahead. It was a simple green chair. There was nothing extraordinary about it or so it seemed. It was the type of chair one would pass without even noticing it was there, let alone what the actual color of it was. It was due to this common and unassuming appearance that few people actually stopped to sit in it and discover its magical powers.",
  "Debbie put her hand into the hole, sliding her hand down as far as her arm could reach. She wiggled her fingers hoping to touch something, but all she felt was air. She shifted the weight of her body to try and reach an inch or two more down the hole. Her fingers still touched nothing but air.Do you really listen when you are talking with someone? I have a friend who listens in an unforgiving way. She actually takes every word you say as being something important and when you have a friend that listens like that, words take on a whole new meaning.",
  "His parents continued to question him. He didn't know what to say to them since they refused to believe the truth. He explained again and again, and they dismissed his explanation as a figment of his imagination. There was no way that grandpa, who had been dead for five years, could have told him where the treasure had been hidden. Of course, it didn't help that grandpa was roaring with laughter in the chair next to him as he tried to explain once again how he'd found it.",
  "I'm heading back to Colorado tomorrow after being down in Santa Barbara over the weekend for the festival there. I will be making October plans once there and will try to arrange so I'm back here for the birthday if possible. I'll let you know as soon as I know the doctor's appointment schedule and my flight plans.They argue. While the argument seems to be different the truth is it's always the same. Yes, the topic may be different or the circumstances, but when all said and done, it all came back to the same thing. They both knew it, but neither has the courage or strength to address the underlying issue. So they continue to argue.",
  "She closed her eyes and then opened them again. What she was seeing just didn't make sense. She shook her head seeing if that would help. It didn't. Although it seemed beyond reality, there was no denying she was witnessing a large formation of alien spaceships filling the sky.Where do they get a random paragraph? he wondered as he clicked the generate button. Do they just write a random paragraph or do they get it somewhere? At that moment he read the random paragraph and realized it was about random paragraphs and his world would never be the same.",
  "His kids were loud. They were way too loud for Jerry, especially since this was a four-hour flight. The parents didn't seem to be able, or simply didn't want, to control them. They were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest. He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
  "A broadband jam is a network of the mind. One cannot separate chickens from glowing periods. A production is a faucet from the right perspective. The lines could be said to resemble zincoid females. A deborah is a tractor's whale. Cod are elite japans. Some posit the wiglike norwegian to be less than plashy. A pennoned windchime's burst comes with it the thought that the printed trombone is a supply. Relations are restless tests.",  "I do wonder why people hate their grey hair so much! I think grey hair is a gift from the moon! When the moon laughs, her eyes produce tears of joy that fall to the earth and onto the tops of people's heads!",
  "There was something special about this little creature. Donna couldn't quite pinpoint what it was, but she knew with all her heart that it was true. It wasn't a matter of if she was going to try and save it, but a matter of how she was going to save it. She went back to the car to get a blanket and when she returned the creature was gone.It was a simple green chair. There was nothing extraordinary about it or so it seemed. It was the type of chair one would pass without even noticing it was there, let alone what the actual color of it was. It was due to this common and unassuming appearance that few people actually stopped to sit in it and discover its magical powers.",
  "His kids were loud. They were way too loud for Jerry, especially since this was a four-hour flight. The parents didn't seem to be able, or simply didn't want, to control them. They were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest. He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
  "Betty decided to write a short story and she was sure it was going to be amazing. She had already written it in her head and each time she thought about it she grinned from ear to ear knowing how wonderful it would be. She could imagine the accolades coming in and the praise she would receive for creating such a wonderful piece. She was therefore extremely frustrated when she actually sat down to write the short story and the story that was so beautiful inside her head refused to come out that way on paper.",
  "His kids were loud. They were way too loud for Jerry, especially since this was a four-hour flight. The parents didn't seem to be able, or simply didn't want, to control them. They were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest. He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
  "Do you really listen when you are talking with someone? I have a friend who listens in an unforgiving way. She actually takes every word you say as being something important and when you have a friend that listens like that, words take on a whole new meaning.God said: Abraham, kill me a son. Abe said: Man, you must be putting me on. God said: No. Abe said: What God said: You can do what you want Abe but the next time you see me coming you'd better run. Abe said: Where you want this killing done? God said: Out on Highway 61.",
  "The vision of an attempt becomes a lawny output. Dibbles are mis womens. The olden penalty reveals itself as a bustled field to those who look. Few can name a chalky force that isn't a primate literature. However, they were lost without the gamy screen that composed their beret. Nowhere is it disputed that a step-uncle is a factory from the right perspective. One cannot separate paints from dreary windows. What we don't know for sure is whether.",
  "You have left a trail of breadcrumb clues which will lead you to the place where your purpose and passion have already met and are simply waiting for you to find them.You have left a trail of breadcrumb clues which will lead you to the place where your purpose and passion have already met and are simply waiting for you to find them. There was something special about this little creature. Donna couldn't quite pinpoint what it was, but she knew with all her heart that it was true. It wasn't a matter of if she was going to try and save it, but a matter of how she was going to save it. She went back to the car to get a blanket and when she returned the creature was gone.",
  "A broadband jam is a network of the mind. One cannot separate chickens from glowing periods. A production is a faucet from the right perspective. The lines could be said to resemble zincoid females. A deborah is a tractor's whale. Cod are elite japans. Some posit the wiglike norwegian to be less than plashy. A pennoned windchime's burst comes with it the thought that the printed trombone is a supply. Relations are restless tests.",  "I do wonder why people hate their grey hair so much! I think grey hair is a gift from the moon! When the moon laughs, her eyes produce tears of joy that fall to the earth and onto the tops of people's heads!",
  "His kids were loud. They were way too loud for Jerry, especially since this was a four-hour flight. The parents didn't seem to be able, or simply didn't want, to control them. They were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest. He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
  "Betty decided to write a short story and she was sure it was going to be amazing. She had already written it in her head and each time she thought about it she grinned from ear to ear knowing how wonderful it would be. She could imagine the accolades coming in and the praise she would receive for creating such a wonderful piece. She was therefore extremely frustrated when she actually sat down to write the short story and the story that was so beautiful inside her head refused to come out that way on paper.",
  "His kids were loud. They were way too loud for Jerry, especially since this was a four-hour flight. The parents didn't seem to be able, or simply didn't want, to control them. They were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest. He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
  "The vision of an attempt becomes a lawny output. Dibbles are mis womens. The olden penalty reveals itself as a bustled field to those who look. Few can name a chalky force that isn't a primate literature. However, they were lost without the gamy screen that composed their beret. Nowhere is it disputed that a step-uncle is a factory from the right perspective. One cannot separate paints from dreary windows. What we don't know for sure is whether.",
  "It was that terrifying feeling you have as you tightly hold the covers over you with the knowledge that there is something hiding under your bed. You want to look, but you don't at the same time. You're frozen with fear and unable to act. That's where she found herself and she didn't know what to do next. Where do they get a random paragraph? he wondered as he clicked the generate button. Do they just write a random paragraph or do they get it somewhere? At that moment he read the random paragraph and realized it was about random paragraphs and his world would never be the same.",
  ];

const retype = document.querySelector(".block button");
const counter = document.querySelector(".time span b");
const mistakeV = document.querySelector(".mistake span");
const wpm = document.querySelector(".wpm span");
const cpm = document.querySelector(".cpm span");
const para = document.querySelector(".typing-text p");
const inputField = document.querySelector(".wrapper .input-field");
const level = document.getElementById("level");
var isLoggedIn;

document.addEventListener("DOMContentLoaded", function() { //fired when HTML document is completely loaded and parsed
  <?php if (isset($_SESSION['user_id'])) { ?>
   isLoggedIn="true";
   document.getElementById("level").style.display = "flex";
  <?php } else { ?>
   isLoggedIn="false";
   document.getElementById("level").style.display = "none";
  <?php } ?>
});

var timer;
var max;
var timeleft = max;
var charIndex = 0;
var mistake = 0;
var isTyping = 0;


function updateMaxTime() {
  var selectedValue = level.value;
  if (selectedValue === "lvl1") {
    max = 60;
    counter.innerHTML = max;
    reset();
  } else if (selectedValue === "lvl2") {
    max = 50;
    counter.innerHTML = max;
    reset();
  } else if (selectedValue === "lvl3") {
    max = 30;
    counter.innerHTML = max;
    reset();
  }
}


//.classList is a property that returns a collection of the CSS classes applied to the element.

function ParaGen() {
  const random = Math.floor(paragraphs.length * Math.random()); //selecting random sentence
  para.innerHTML = "";
  paragraphs[random].split("").forEach((char) => {
    //split into  array of individual character
    let span = `<span>${char}</span>`; //Template literals enable you to embed expressions within the string
    para.innerHTML += span;
  });
  para.querySelectorAll("span")[0].classList.add("active"); //select span node 0 and add css to active class of element
  document.addEventListener("keydown", () => inputField.focus()); //when key is pressed calls focus method
  para.addEventListener("click", () => inputField.focus()); //when clicked para will be focused

}

function initial_time() {
  if (timeleft > 0) {
    timeleft--; //time countdown
    counter.innerText = timeleft;

    let wpmV = Math.round(((charIndex - mistake) / 5 / (max - timeleft)) * 60);
    wpm.innerText = wpmV;
  } else {
  }
}

function typing() {
  let keys = para.querySelectorAll("span");
  let typed = inputField.value.split("")[charIndex]; //assign char at specific index

  if (charIndex < keys.length - 1 && timeleft > 0) {
    if (!isTyping) {
      timer = setInterval(initial_time, 1000); //executes initial_time function repeatedly at 1sec
      isTyping = true;
    }
    if (typed == null) {
      if (charIndex > 0) {
        charIndex--;
        if (keys[charIndex].classList.contains("incorrect")) {
          //checks if element has a class named "incorrect"
          mistake--;
        }
        keys[charIndex].classList.remove("correct", "incorrect"); //removes class when reach to certain index
      }
    } else {
      if (keys[charIndex].innerText == typed) {
        keys[charIndex].classList.add("correct"); //add correct elements css if user typing and para char is correct
      } else {
        mistake++; //else it is a mistake
        keys[charIndex].classList.add("incorrect");
      }
      charIndex++;
    }
    keys.forEach((span) => span.classList.remove("active")); //removes the CSS of class "active" from the class list.
    keys[charIndex].classList.add("active");

    let wpmV = Math.round(((charIndex - mistake) / 5 / (max - timeleft)) * 60);
    wpmV = wpmV < 0 || !wpmV || wpmV === Infinity ? 0 : wpmV; //checks if wpmV is negative, false or infinity. If any of these conditions are true, wpmV=0. Otherwise, wpmV = wpmV

    wpm.innerHTML = wpmV;
    mistakeV.innerText = mistake;
    cpm.innerText = charIndex - mistake; //correct words
  } else {
    clearInterval(timer);
    inputField.value = "";
  }
}
function reset() {
  ParaGen();
  clearInterval(timer);
  timeleft = max;
  charIndex = mistake = isTyping = 0;
  inputField.value = "";
  counter.innerText = timeleft;
  wpm.innerText = 0;
  mistakeV.innerText = 0;
  cpm.innerText = 0;
}

ParaGen();
inputField.addEventListener("input", typing);
retype.addEventListener("click", reset);

level.addEventListener("change", function () {
    updateMaxTime();
});


</script>
</html>