<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/about_us.css">
</head>

<body>
    <a href="/src/home.php" class="arrow"><i id="icon" class="fa fa-arrow-left"></i></a>
    <section>
        <h2>What is a Typing Speed Calculator?</h2><br>
        <p>A typing speed calculator is a tool designed to measure and
            evaluate an individual's typing speed and accuracy. It provides users with a
            timed typing test and calculates various metrics such as Mistake, WPM(Word Per Minute) and CPM(Character Per Minute)
            to evaluate typing skills.
            The primary purpose of a typing speed calculator is to help individuals improve their
            typing speed and accuracy through practice and monitoring their progress over time.
        </p><br>
        <h2>Guide on: How to use Speedy</h2><br>
        <p>Speedy is a free Platform. You get to decide wehether you want to create an account or not !!
        <ul>
            <br>
            <li><b>Calculate Speed</b></li>
            You can test your ability without creating an account as well but you'll not have access to few features.
            To take a test Press on the Start Typing button which is on the top in the menu item.
            There is a reset button on the top of the side bar with will help to change the paragraph as well as reset the whole test.
            At the bottom there are different metrics which determines the speed. It will begin the test once you press any key on your keyboard.
            Mistakes are denoted with color 'Red' and correct word with color 'White'. You will be restricted to type once the countdown is over. <br>

            <br>
            <li><b>Creating an account</b></li>
            First you'll have to enter to the login page, To do so you First
            have to press the login button which is available in two places;
            one at the top right on menu list and another on the bottom of the home page.
            Once you enter to the login page you'll see the Create an Account Button. Press on it and fill up the necessary Credentials which also satisfies the requirements.
            If successfully created an account, you'll be redirected to the login page and then you can easily login.<br>

            <br>
            <li><b>Forgot Pasword</b></li>
            You don't have to worry if you forget your password. We got you!!
            <br>First open the login page then you'll find the forgot password button. Click on it and a form will appear. Fill in your Username Correctly and set new Password.<br>

            <br>
            <li><b>Change Levels</b></li>
            Changing Level is possible only if you have logged in. Once you have logged in you'll see the level option. Level consists of 3 types; level 1 as 'Easy'
            Level 2 as 'Medium' and Level 3 as 'Hard'. As level changes the time decreases and you have to type the paragraph within the given time.<br>

            <br>
            <li><b>Tips the enhance your skill</b></li>
            There is a section which will provide the tips on how to enhance your typing skill. It shows the factors that are affecting your typing and gives
            tips on how to sharpen your skills.<br>

            <br>
            <li><b>Save the Result</b></li>
            Saving result is only possible if you create an account. Once the countdown is over the save button appers on the bottom right of the test. You can press on the save button and
            the result will be save and displayed on the result section. It is only visible to authorized user.
            <br>
        </ul>
        </p><br>
        <h2>How does it Calculate?</h2>

        <p>There are formulas for calculating various metrics in our typing test. Let's break down each metric:</p>

        <h3>Mistake Calculation (Using Levenshtein Distance)</h3>

        <p>In our implementation, we use the Levenshtein distance to calculate the number of mistakes. The Levenshtein distance is a measure of the difference between two strings. It represents the minimum number of single-character edits (insertions, deletions, or substitutions) required to change one word into another.</p>

        <h4>Levenshtein Distance Formula:</h4>
        <p>Let <i>a</i> and <i>b</i> be two strings of length <code>|a|</code> and <code>|b|</code> respectively. The Levenshtein distance between <i>a</i> and <i>b</i> is given by <code>lev(a,b)</code>, where:</p>

        <pre><code>
lev(a,b) = 
    max(|a|, |b|)                          if min(|a|, |b|) = 0
    min(
        lev(tail(a), b) + 1,
        lev(a, tail(b)) + 1,
        lev(tail(a), tail(b)) + cost
    )

where cost = 0 if a[0] = b[0], and 1 otherwise
and tail(x) is x with the first character removed
    </code></pre>

        <p>In our code, this is implemented in the <code>levenshteinDistance</code> function:</p>

        <pre><code>
function levenshteinDistance(str1, str2) {
    const len1 = str1.length;
    const len2 = str2.length;
    const dp = Array(len1 + 1).fill(null).map(() => Array(len2 + 1).fill(null));
    
    for (let i = 0; i <= len1; i++) dp[i][0] = i;
    for (let j = 0; j <= len2; j++) dp[0][j] = j;
    
    for (let i = 1; i <= len1; i++) {
        for (let j = 1; j <= len2; j++) {
            const cost = str1[i - 1] === str2[j - 1] ? 0 : 1;
            dp[i][j] = Math.min(
                dp[i - 1][j] + 1,
                dp[i][j - 1] + 1,
                dp[i - 1][j - 1] + cost
            );
        }
    }
    
    return dp[len1][len2];
}
    </code></pre>

        <p>The number of mistakes is then equal to the Levenshtein distance between the typed text and the original text.</p>

        <h3>Words Per Minute (WPM)</h3>

        <p>WPM measures the number of words typed per minute.</p>

        <h4>Formula:</h4>
        <pre><code>
WPM = (Total Words Typed / Time Elapsed in minutes)
    </code></pre>

        <p>In our code:</p>

        <pre><code>
let timeElapsed = (max - timeleft) / 60; // in minutes
let totalWords = inputField.value.trim().split(/\s+/).length;
let wpmV = Math.round(totalWords / timeElapsed);
    </code></pre>

        <h3>Characters Per Minute (CPM)</h3>

        <p>CPM measures the number of correct characters typed per minute.</p>

        <h4>Formula:</h4>
        <pre><code>
CPM = (Total Characters Typed - Mistakes) / Time Elapsed in minutes
    </code></pre>

        <p>In our code:</p>

        <pre><code>
let timeElapsed = (max - timeleft) / 60; // in minutes
let correctChars = charIndex - mistake;
let cpmV = Math.round(correctChars / timeElapsed);
    </code></pre>

        <p>These calculations provide a comprehensive assessment of typing speed and accuracy, with the Levenshtein distance offering a more nuanced measure of mistakes than simple character-by-character comparison.</p>
        </ul>
    </section><br><br>
</body>

</html>