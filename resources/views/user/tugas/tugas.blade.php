<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Quiz Questions</h1>
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            @foreach ($tugas as $index => $data)
                <div class="mb-6">
                    <p class="text-lg font-semibold">data {{ $index + 1 }}: {{ $data->pertanyaan }}</p>
                    <div class="mt-2">
                        <label class="block">
                            <input type="radio" name="answers[{{ $data->id }}]" value="A" class="mr-2" required>
                            {{ $data->pilihan_a }}
                        </label>
                        <label class="block">
                            <input type="radio" name="answers[{{ $data->id }}]" value="B" class="mr-2" required>
                            {{ $data->pilihan_b }}
                        </label>
                        <label class="block">
                            <input type="radio" name="answers[{{ $data->id }}]" value="C" class="mr-2" required>
                            {{ $data->pilihan_c }}
                        </label>
                        <label class="block">
                            <input type="radio" name="answers[{{ $data->id }}]" value="D" class="mr-2" required>
                            {{ $data->pilihan_d }}
                        </label>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit Answers</button>
        </form>
    </div>
</body>
</html>