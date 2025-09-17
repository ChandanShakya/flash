<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Test</title>
    <link rel="stylesheet" href="../assets/css/typing.css">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>
    <?php
    include_once 'menu.php';
    ?>
    
    <!-- Controls and Virtual Keyboard Container -->
    <div class="keyboard-section">
        <!-- Left Controls -->
        <div class="left-controls">
            <select id="level">
                <option value="lvl1">Level 1</option>
                <option value="lvl2">Level 2</option>
                <option value="lvl3">Level 3</option>
            </select>
        </div>

        <!-- Virtual Keyboard -->
        <div class="keyboard-container">
            <div class="keyboard">
                <div class="keyboard-row">
                    <div class="key" data-key="`">~<br>`</div>
                    <div class="key" data-key="1">!<br>1</div>
                    <div class="key" data-key="2">@<br>2</div>
                    <div class="key" data-key="3">#<br>3</div>
                    <div class="key" data-key="4">$<br>4</div>
                    <div class="key" data-key="5">%<br>5</div>
                    <div class="key" data-key="6">^<br>6</div>
                    <div class="key" data-key="7">&<br>7</div>
                    <div class="key" data-key="8">*<br>8</div>
                    <div class="key" data-key="9">(<br>9</div>
                    <div class="key" data-key="0">)<br>0</div>
                    <div class="key" data-key="-">_<br>-</div>
                    <div class="key" data-key="=">+<br>=</div>
                    <div class="key key-large" data-key="Backspace">Backspace</div>
                </div>
                <div class="keyboard-row">
                    <div class="key key-large" data-key="Tab">Tab</div>
                    <div class="key" data-key="q">Q</div>
                    <div class="key" data-key="w">W</div>
                    <div class="key" data-key="e">E</div>
                    <div class="key" data-key="r">R</div>
                    <div class="key" data-key="t">T</div>
                    <div class="key" data-key="y">Y</div>
                    <div class="key" data-key="u">U</div>
                    <div class="key" data-key="i">I</div>
                    <div class="key" data-key="o">O</div>
                    <div class="key" data-key="p">P</div>
                    <div class="key" data-key="[">{<br>[</div>
                    <div class="key" data-key="]">}<br>]</div>
                    <div class="key key-large" data-key="\">|<br>\</div>
                </div>
                <div class="keyboard-row">
                    <div class="key key-large" data-key="CapsLock">Caps Lock</div>
                    <div class="key" data-key="a">A</div>
                    <div class="key" data-key="s">S</div>
                    <div class="key" data-key="d">D</div>
                    <div class="key" data-key="f">F</div>
                    <div class="key" data-key="g">G</div>
                    <div class="key" data-key="h">H</div>
                    <div class="key" data-key="j">J</div>
                    <div class="key" data-key="k">K</div>
                    <div class="key" data-key="l">L</div>
                    <div class="key" data-key=";">:<br>;</div>
                    <div class="key" data-key="'">"<br>'</div>
                    <div class="key key-large" data-key="Enter">Enter</div>
                </div>
                <div class="keyboard-row">
                    <div class="key key-large" data-key="Shift">Shift</div>
                    <div class="key" data-key="z">Z</div>
                    <div class="key" data-key="x">X</div>
                    <div class="key" data-key="c">C</div>
                    <div class="key" data-key="v">V</div>
                    <div class="key" data-key="b">B</div>
                    <div class="key" data-key="n">N</div>
                    <div class="key" data-key="m">M</div>
                    <div class="key" data-key=","><</span><br>,</div>
                    <div class="key" data-key=".">><br>.</div>
                    <div class="key" data-key="/">?<br>/</div>
                    <div class="key key-large" data-key="Shift">Shift</div>
                </div>
                <div class="keyboard-row">
                    <div class="key key-large" data-key="Control">Ctrl</div>
                    <div class="key key-large" data-key="Meta">Win</div>
                    <div class="key key-large" data-key="Alt">Alt</div>
                    <div class="key key-space" data-key=" ">Space</div>
                    <div class="key key-large" data-key="Alt">Alt</div>
                    <div class="key key-large" data-key="Meta">Win</div>
                    <div class="key key-large" data-key="ContextMenu">Menu</div>
                    <div class="key key-large" data-key="Control">Ctrl</div>
                </div>
            </div>
        </div>

        <!-- Right Controls -->
        <div class="right-controls">
            <button class="reset"><i class="fa fa-rotate-right"></i></button>
        </div>
    </div>

    <section class="typing-test">
        <ul class="result-details">
            <li class="time">
                <p>Time Left:</p>
                <span id="time"><b></b>s</span>
            </li>
            <li class="mistake">
                <p>Mistakes:</p>
                <span>0</span>
            </li>
        </ul>
        <div class="wrapper">
            <input type="text" class="input-field">
            <div class="content-box">
                <div class="typing-text">
                    <p id="paragraph"></p>
                </div>
                <div class="content">
                    <form id="saveForm" action="save_result.php" method="POST">
                        <input type="hidden" name="wpmValue" value="">
                        <input type="hidden" name="mistakeValue" value="">
                        <input type="hidden" name="cpmValue" value="">
                        <input type="hidden" name="levelValue" value="">
                        <input type="hidden" name="accuracy" value="">
                        <button type="submit" id="savebtn" class="save">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <ul class="result-details">
            <li class="wpm">
                <p>WPM:</p>
                <span>0</span>
            </li>
            <li class="cpm">
                <p>CPM:</p>
                <span>0</span>
            </li>
        </ul>
    </section>
</body>
<script>
    const paragraphs = [
        "He knew it was going to be a bad day when he saw mountain lions roaming the streets.The teens wondered what was kept in the red shed on the far edge of the school grounds. You have no right to call yourself creative until you look at a trowel and think that it would make a great lockpick.As you consider all the possible ways to improve yourself and the world, you notice John Travolta seems fairly unhappy.  He thought about politely tapping on the parents' shoulders and asking them to try and get their kids under a bit more control, but before he did he came up with a better idea.",
        "Harrold felt confident that nobody would ever suspect his spy pigeon.She wondered what his eyes were saying beneath his mirrored sunglasses.You should never take advice from someone who thinks red paint dries quicker than blue paint.Each person who knows you has a different perception of who you are. The tour bus was packed with teenage girls heading toward their next adventure.He decided that the time had come to be stronger than any of the excuses he'd used until then. You're good at English when you know the difference between a man eating chicken and a man-eating chicken.",
        "I was very proud of my nickname throughout high school but today- I couldn't be any different to what my nickname was. Had he known what was going to happen, he would have never stepped into the shower.Buried deep in the snow, he hoped his batteries were fresh in his avalanche beacon.It was that terrifying feeling you have as you tightly hold the covers over you with the knowledge that there is something hiding under your bed. You want to look, but you don't at the same time. You're frozen with fear and unable to act. That's where she found herself and she didn't know what to do next",
        "She had been told time and time again that the most important steps were the first and the last. It was something that she carried within her in everything she did, but then he showed up and disrupted everything. He told her that she had it wrong. The first step wasn't the most important. The last step wasn't the most important. It was the next step that was the most important. Terrance knew that sometimes it was simply best to stay out of it. He kept repeating this to himself as he watched the scene unfold. He knew that nothing good would come of him getting involved. ",
        "The water rush down the wash and into the slot canyon below. Two hikers had started the day to sunny weather without a cloud in the sky, but they hadn't thought to check the weather north of the canyon. Huge thunderstorms had brought a deluge o rain and produced flash floods heading their way. The two hikers had no idea what was coming. Twenty-five hours had passed since the incident. It seemed to be a lot longer than that. That twenty-five hours seemed more like a week in her mind. The fact that she still was having trouble comprehending exactly what took place wasn't helping the matter.",
        "An aunt is a bassoon from the right perspective. As far as we can estimate, some posit the melic myanmar to be less than kutcha. One cannot separate foods from blowzy bows. The scampish closet reveals itself as a sclerous llama to those who look. A hip is the skirt of a peak. Some hempy laundries are thought of simply as orchids. A gum is a trumpet from the right perspective. A freebie flight is a wrench of the mind. Some posit the croupy.",
        "A baby is a shingle from the right perspective. Before defenses, collars were only operations. Bails are gleesome relatives. An alloy is a streetcar's debt. A fighter of the scarecrow is assumed to be a leisured laundry. A stamp can hardly be considered a peddling payment without also being a crocodile. A skill is a meteorology's fan. Their scent was, in this moment, a hidden feeling. The competitor of a bacon becomes a boxlike cougar. Hey were yelling and fighting among themselves and it was impossible for any of the passengers to concentrate or rest.",
        "A broadband jam is a network of the mind. One cannot separate chickens from glowing periods. A production is a faucet from the right perspective. The lines could be said to resemble zincoid females. A deborah is a tractor's whale. Cod are elite japans. Some posit the wiglike norwegian to be less than plashy. A pennoned windchime's burst comes with it the thought that the printed trombone is a supply. Relations are restless tests.",
    ];


    const retype = document.querySelector(".reset");
    const counter = document.querySelector(".time span b");
    const mistakeV = document.querySelector(".mistake span");
    const wpm = document.querySelector(".wpm span");
    const cpm = document.querySelector(".cpm span");
    const para = document.querySelector(".typing-text p");
    const inputField = document.querySelector(".wrapper .input-field");
    const level = document.getElementById("level");
    var isLoggedIn;
    const save = document.querySelector("#savebtn");

    var timer;
    var max;
    var timeleft = max;
    var charIndex = 0;
    var mistake = 0;
    var isTyping = 0;
    var errorPositions = new Set(); // Track error positions
    var isResetting = false; // Add flag to prevent multiple resets
    var lastParagraphIndex = -1; // Track last used paragraph

    document.addEventListener("DOMContentLoaded", function() { //fired when HTML document is completely loaded and parsed
        <?php if (isset($_SESSION['user_id'])) { ?>
            isLoggedIn = "true";
            updateMaxTime();
        <?php } else { ?>
            isLoggedIn = "false";
            updateMaxTime();
        <?php } ?>
    });

    function ParaGen() {
        let random;
        // Ensure we get a different paragraph than the last one
        do {
            random = Math.floor(Math.random() * paragraphs.length);
        } while (random === lastParagraphIndex && paragraphs.length > 1);
        
        lastParagraphIndex = random;
        const selectedParagraph = paragraphs[random];
        
        // Limit paragraph length for better performance
        const maxLength = 300;
        const trimmedParagraph = selectedParagraph.length > maxLength 
            ? selectedParagraph.substring(0, maxLength).trim() 
            : selectedParagraph;
        
        // Clear existing content first
        para.innerHTML = '';
        
        // Create spans and add them directly
        trimmedParagraph.split('').forEach((char, index) => {
            const span = document.createElement('span');
            span.textContent = char;
            if (index === 0) {
                span.classList.add('active');
            }
            para.appendChild(span);
        });
        
        // Ensure focus handlers are set
        document.removeEventListener("keydown", focusInput);
        para.removeEventListener("click", focusInput);
        document.addEventListener("keydown", focusInput);
        para.addEventListener("click", focusInput);
    }

    // Separate focus function to avoid memory leaks
    function focusInput() {
        inputField.focus();
    }

    function updateMaxTime() {
        var selectedValue = level.value;
        if (selectedValue === "lvl1") {
            max = 60;
        } else if (selectedValue === "lvl2") {
            max = 50;
        } else if (selectedValue === "lvl3") {
            max = 30;
        }
        
        timeleft = max;
        counter.innerHTML = max;
        reset();
    }

    //.classList is a property that returns a collection of the CSS classes applied to the element.

    function reset() {
        if (isResetting) return; // Prevent multiple resets
        isResetting = true;
        
        // Add loading state to reset button
        retype.classList.add('loading');
        
        // Clear timer first
        clearInterval(timer);
        
        // Reset all variables
        timeleft = max;
        charIndex = 0;
        mistake = 0;
        isTyping = 0;
        errorPositions.clear();
        
        // Reset UI elements
        inputField.value = "";
        inputField.removeAttribute('disabled');
        counter.innerText = timeleft;
        wpm.innerText = 0;
        mistakeV.innerText = 0;
        cpm.innerText = 0;
        save.style.display = "none";
        
        // Generate new paragraph immediately (remove the isResetting check block)
        ParaGen();
        
        // Focus input field and remove loading state with a small delay
        setTimeout(() => {
            inputField.focus();
            retype.classList.remove('loading');
            isResetting = false;
        }, 100);
    }

    //.classList is a property that returns a collection of the CSS classes applied to the element.

    function initial_time() {
        if (timeleft > 0) {
            timeleft--;
            counter.innerText = timeleft;
            updateResults();
            if (timeleft === 0) {
                endTest();
            }
        }
    }

    function result() {
        let wpmValue = wpm.innerText;
        let cpmValue = cpm.innerText;
        let mistakesValue = mistakeV.innerText;

        alert("WPM: " + wpmValue + "\nCPM: " + cpmValue + "\nMistakes: " + mistakesValue);
    }

    /*
    $(document).ready(function() {
      $('input').on('input', function() {
        if ($(this).val().trim().length > 0) {
          $('.save').css('display', 'block');
        } else {
          $('.save').css('display', 'none');
        }
      });
    });

    */
    // Function to calculate Levenshtein Distance
    function levenshteinDistance(str1, str2) {
        const len1 = str1.length;
        const len2 = str2.length;

        // Create a 2D array to store distances
        const dp = Array(len1 + 1).fill(null).map(() => Array(len2 + 1).fill(null));

        // Initialize the base case values
        for (let i = 0; i <= len1; i++) dp[i][0] = i;
        for (let j = 0; j <= len2; j++) dp[0][j] = j;

        // Calculate distances
        for (let i = 1; i <= len1; i++) {
            for (let j = 1; j <= len2; j++) {
                const cost = str1[i - 1] === str2[j - 1] ? 0 : 1;
                dp[i][j] = Math.min(
                    dp[i - 1][j] + 1, // Deletion
                    dp[i][j - 1] + 1, // Insertion
                    dp[i - 1][j - 1] + cost // Substitution
                );
            }
        }

        return dp[len1][len2]; // The edit distance
    }

    // Keyboard highlighting functions
    function highlightKey(key) {
        const keyElement = document.querySelector(`[data-key="${key}"]`);
        if (keyElement) {
            keyElement.classList.add('active-key');
            setTimeout(() => {
                keyElement.classList.remove('active-key');
            }, 150);
        }
    }

    // Handle keydown events for keyboard highlighting
    document.addEventListener('keydown', function(e) {
        let key = e.key;

        // Handle special keys
        if (key === ' ') key = ' ';
        else if (key.length === 1) key = key.toLowerCase();

        highlightKey(key);

        // Focus input field
        inputField.focus();
    });

    function typing() {
        if (timeleft <= 0 || isResetting) {
            inputField.setAttribute('disabled', 'disabled');
            return;
        }

        let keys = para.querySelectorAll("span");
        let typedText = inputField.value;
        let originalText = para.innerText;

        // Update character index
        charIndex = typedText.length;

        // Clear previous error positions for current length
        if (charIndex < errorPositions.size) {
            errorPositions.forEach(pos => {
                if (pos >= charIndex) {
                    errorPositions.delete(pos);
                }
            });
        }

        // Check for errors at current position
        for (let i = 0; i < typedText.length && i < originalText.length; i++) {
            if (typedText[i] !== originalText[i]) {
                errorPositions.add(i);
            } else {
                errorPositions.delete(i);
            }
        }

        // Update mistake count
        mistake = errorPositions.size;
        mistakeV.innerText = mistake;

        // Handle timer
        if (!isTyping && charIndex > 0) {
            timer = setInterval(initial_time, 1000);
            isTyping = true;
        }

        // Update character styling - ensure we have spans
        if (keys.length > 0) {
            keys.forEach((span, index) => {
                span.classList.remove("correct", "incorrect", "active");
                if (index < charIndex) {
                    if (errorPositions.has(index)) {
                        span.classList.add("incorrect");
                    } else {
                        span.classList.add("correct");
                    }
                } else if (index === charIndex) {
                    span.classList.add("active");
                }
            });
        }

        // Calculate WPM and CPM
        updateResults();
    }

    function updateResults() {
        if (timeleft < max) {
            let timeElapsed = (max - timeleft) / 60; // in minutes
            let totalWords = inputField.value.trim().split(/\s+/).length;
            let correctChars = charIndex - mistake;

            let wpmV = Math.round(totalWords / timeElapsed);
            let cpmV = Math.round(correctChars / timeElapsed);

            wpm.innerText = wpmV < 0 || !wpmV || wpmV === Infinity ? 0 : wpmV;
            cpm.innerText = cpmV < 0 || !cpmV || cpmV === Infinity ? 0 : cpmV;
        }
    }

    function endTest() {
        clearInterval(timer);
        inputField.setAttribute('disabled', 'disabled');
        updateResults();
        if (isLoggedIn === "true") {
            save.style.display = "block";
        }
    }

    $(document).ready(function() {
        $('#savebtn').click(function() {
            var wpmValue = $(".wpm span").text();
            var mistakeValue = $(".mistake span").text();
            var cpmValue = $(".cpm span").text();
            var levelValue = $("#level").val();
            var accuracy = ((charIndex - mistake) / (charIndex)) * 100;

            // input[name=''] is a descendant selector
            $("#saveForm input[name='wpmValue']").val(wpmValue); //select form, select input element with name, set value of selected input
            //.val() is used to set or get value of form element
            $("#saveForm input[name='mistakeValue']").val(mistakeValue);
            $("#saveForm input[name='cpmValue']").val(cpmValue);
            $("#saveForm input[name='levelValue']").val(levelValue);
            $("#saveForm input[name='accuracy']").val(accuracy);
            $("#saveForm").submit();
        });
    });

    ParaGen();
    inputField.addEventListener("input", typing);
    retype.addEventListener("click", reset); // Use direct reset handler

    level.addEventListener("change", function() {
        updateMaxTime();
    });
</script>

</html>