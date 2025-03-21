// countdown.js
document.addEventListener('DOMContentLoaded', function() {
    function updateCountdown() {
        const eventDate = new Date('February 1, 2025 00:00:00').getTime();
        
        function update() {
            const now = new Date().getTime();
            const distance = eventDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const daysElement = document.getElementById('days');
            const hoursElement = document.getElementById('hours');
            const minutesElement = document.getElementById('minutes');
            const secondsElement = document.getElementById('seconds');

            if (daysElement && hoursElement && minutesElement && secondsElement) {
                daysElement.textContent = String(days).padStart(2, '0');
                hoursElement.textContent = String(hours).padStart(2, '0');
                minutesElement.textContent = String(minutes).padStart(2, '0');
                secondsElement.textContent = String(seconds).padStart(2, '0');
            }

            if (distance < 0) {
                clearInterval(interval);
                const countdownTimer = document.getElementById('countdown-timer');
                if (countdownTimer) {
                    countdownTimer.innerHTML = '<div class="countdown-item" style="background: rgb(0 0 0 / 59%); padding: 20px; border-radius: 10px; width: 100%; text-align: center;"><span style="color: #fff; font-size: 24px;">L\'événement a commencé!</span></div>';
                }
            }
        }

        const interval = setInterval(update, 1000);
        update();
    }

    updateCountdown();
});