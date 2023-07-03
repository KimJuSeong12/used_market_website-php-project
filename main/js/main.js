function setupTypewriter(element) {
  var HTML = element.innerHTML;
  element.innerHTML = "";

  var cursorPosition = 0,
    tag = "",
    writingTag = false,
    tagOpen = false,
    typeSpeed = 50,
    tempTypeSpeed = 0;

  var type = function () {
    if (writingTag === true) {
      tag += HTML[cursorPosition];
    }

    if (HTML[cursorPosition] === "<") {
      tempTypeSpeed = 0;
      if (tagOpen) {
        tagOpen = false;
        writingTag = true;
      } else {
        tag = "";
        tagOpen = true;
        writingTag = true;
        tag += HTML[cursorPosition];
      }
    }
    if (!writingTag && tagOpen) {
      tag.innerHTML += HTML[cursorPosition];
    }
    if (!writingTag && !tagOpen) {
      if (HTML[cursorPosition] === " ") {
        tempTypeSpeed = 0;
      } else {
        tempTypeSpeed = Math.random() * typeSpeed + 50;
      }
      element.innerHTML += HTML[cursorPosition];
    }
    if (writingTag === true && HTML[cursorPosition] === ">") {
      tempTypeSpeed = Math.random() * typeSpeed + 50;
      writingTag = false;
      if (tagOpen) {
        var newSpan = document.createElement("span");
        element.appendChild(newSpan);
        newSpan.innerHTML = tag;
        tag = newSpan.firstChild;
      }
    }

    cursorPosition += 1;
    if (cursorPosition < HTML.length - 1) {
      setTimeout(type, tempTypeSpeed);
    }
  };

  return {
    type: type,
  };
}

const typewriter1 = document.getElementById("p5");
const typewriterEffect1 = setupTypewriter(typewriter1);
typewriterEffect1.type();
