@props(['rating' => 0])

<div class="star-rating flex space-x-1">
    @for($i = 1; $i <= 5; $i++)
        <svg
            class="star cursor-pointer w-6 h-6 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }}"
            fill="currentColor" viewBox="0 0 24 24"
            onclick="setRating({{ $i }})"
            role="button" aria-label="Set rating {{ $i }}"
        >
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
        </svg>
    @endfor
</div>

<script>
    function setRating(value) {
        const input = document.getElementById('rating');
        if (!input) return;

        input.value = value;

        // Update stars color
        const stars = document.querySelectorAll('.star-rating .star');
        stars.forEach((star, index) => {
            if (index < value) {
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        });
    }

    // Initialize stars on page load (in case old value exists)
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('rating');
        if (input && input.value > 0) {
            setRating(parseInt(input.value));
        }
    });
</script>
