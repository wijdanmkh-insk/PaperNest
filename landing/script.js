document.addEventListener('DOMContentLoaded', () => {
  const mottoElement = document.getElementById('motto');
  const phrases = ['RELIABLE', 'AFFORDABLE'];
  let currentIndex = 0;

  function text_transition(){
    const mottoElement = document.getElementById('motto');
    const phrases = ['RELIABLE', 'AFFORDABLE'];
    let currentIndex = 0;

    function changeText() {
        currentIndex = (currentIndex + 1) % phrases.length;
        mottoElement.textContent = phrases[currentIndex];
    }

    setInterval(changeText, 2000);
  }

  text_transition();
});
