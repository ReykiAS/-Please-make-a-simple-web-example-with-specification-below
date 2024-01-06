<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    
</head>
<body>

<div class="form-container">
    <div class="form-group">
        <label for="authorSelect">Select Author:</label>
        <select id="authorSelect" class="form-control">
            <option value="">Select Author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->authorName }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="bookSelect">Select Book:</label>
        <select id="bookSelect" class="form-control">
            <option value="">Select Book</option>
        </select>
    </div>

    <div class="form-group">
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" class="form-control" min="1" max="10">
    </div>

    <button class="submit-btn" id="submitBtn">Submit</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#authorSelect').change(function () {
            var authorId = $(this).val();

            if (authorId) {
                $.ajax({
                    url: '/filter-books-by-author/' + authorId,
                    type: 'GET',
                    success: function (data) {
                        $('#bookSelect').html('<option value="">Select Book</option>');
                        $.each(data, function (index, book) {
                            $('#bookSelect').append('<option value="' + book.id + '">' + book.title + '</option>');
                        });
                    }
                });
            } else {
                $('#bookSelect').html('<option value="">Select Book</option>');
            }
        });

        $('#submitBtn').click(function () {
            var bookId = $('#bookSelect').val();
            var rating = $('#rating').val();

            $.ajax({
                url: '/give-rating',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'book_id': bookId,
                    'rating': rating
                },
                success: function (response) {
                    alert('Rating submitted successfully.');
                    window.location.href = '/';
                },
                error: function (error) {
                    alert('Error submitting rating.');
                }
            });
        });
    });
</script>

</body>
</html>
