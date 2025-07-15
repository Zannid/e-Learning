<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quiz | Scholar</title>

  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  @php $durationInSeconds = $quiz->durasi * 60; @endphp

<style>
body {
  font-family: 'Poppins', sans-serif;
  background-color: #f2ecfa;
}

.container {
  background-color: #fff;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
  margin-top: 50px;
  position: relative;
}

.quiz-header {
  background: linear-gradient(to right, #a779e9, #c3b3f5);
  color: #fff;
  padding: 30px;
  border-radius: 14px;
  margin-bottom: 25px;
  position: relative;
}

.quiz-header h2 {
  font-weight: 700;
  font-size: 26px;
  margin-bottom: 5px;
}

.quiz-header h4 {
  font-weight: 600;
  font-size: 20px;
  margin-bottom: 10px;
}

.quiz-note {
  font-size: 13px;
  font-style: italic;
  color: #ffe6e6;
  border-top: 1px solid rgba(255, 255, 255, 0.2);
  padding-top: 10px;
}

#countdown {
  position: absolute;
  top: 25px;
  right: 30px;
  background-color: #fff;
  color: #7e5bef;
  font-weight: bold;
  font-size: 15px;
  padding: 10px 18px;
  border-radius: 30px;
  border: 2px solid #d2b9ff;
  display: flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 0 10px rgba(126, 91, 239, 0.2);
  transition: all 0.3s ease;
}

#countdown i {
  color: #a779e9;
}

.question-card {
  display: none;
  border-left: 4px solid #a779e9;
  padding: 20px;
  border-radius: 8px;
  background-color: #fff;
  animation: fadeIn 0.5s ease-in-out;
}

.question-card.active {
  display: block;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(15px);}
  to {opacity: 1; transform: translateY(0);}
}

.option-btn {
  display: block;
  width: 100%;
  text-align: left;
  background-color: #f7f0ff;
  border: 2px solid #e0d4ff;
  padding: 14px 20px;
  border-radius: 10px;
  margin-bottom: 12px;
  cursor: pointer;
  transition: 0.2s;
  font-weight: 500;
}

.option-btn:hover {
  background-color: #ece0ff;
  transform: scale(1.01);
}

.option-btn.selected {
  background-color: #d9c4ff;
  border-color: #a779e9;
  font-weight: 600;
  color: #5c2fd4;
  box-shadow: 0 0 8px rgba(167, 121, 233, 0.3);
}

.submit-btn {
  background: linear-gradient(to right, #7e5bef, #a779e9);
  border: none;
  color: white;
  padding: 12px 35px;
  font-weight: 600;
  border-radius: 30px;
  font-size: 16px;
  transition: 0.3s;
}

.submit-btn:hover {
  transform: scale(1.03);
  box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
}
</style>

</head>
<body>

  <div class="container">
    <div class="quiz-header">
      <h2>Mengerjakan Quiz</h2>
      <h4>{{ $quiz->judul }}</h4>

      @if($quiz->deskripsi)
        <p>{{ $quiz->deskripsi }}</p>
      @endif

      <div id="countdown">
  <i class="fas fa-hourglass-half"></i>
  <span id="time">--:--</span>
</div>


      <div class="quiz-note">
        * Quiz akan otomatis diselesaikan jika waktu habis.
      </div>
    </div>


    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <form method="POST" action="{{ route('user.quiz.submit', $quiz->id) }}" id="quizForm">
  @csrf
  @foreach ($quiz->soal as $soal)
    <div class="card question-card @if($loop->first) active @endif" data-index="{{ $loop->index }}">
      <div class="card-body">
        <h5 class="card-title text-primary">Soal {{ $loop->iteration }}</h5>
        <p class="card-text">{{ $soal->pertanyaan }}</p>

        @foreach (['A', 'B', 'C', 'D'] as $opt)
          @php
            $inputId = 'soal_' . $soal->id . '_' . $opt;
            $pilihan = $soal->{'pilihan_' . strtolower($opt)};
          @endphp

          @if($pilihan)
            <button 
              type="button"
              class="option-btn"
              data-soal-id="{{ $soal->id }}"
              data-value="{{ $opt }}"
            >
              <strong>{{ $opt }}.</strong> {{ $pilihan }}
            </button>

            <input 
              type="radio" 
              name="jawaban[{{ $soal->id }}]" 
              value="{{ $opt }}" 
              id="{{ $inputId }}"
              style="display: none;"
            >
          @endif
        @endforeach

      </div> <!-- end of card-body -->
    </div> <!-- end of card -->
  @endforeach

  <div class="text-center mt-4">
    <button type="submit" class="submit-btn">
      <i class="fas fa-paper-plane me-2"></i> Selesaikan Quiz
    </button>
  </div>
</form> <!-- ✅ form ditutup di sini -->

  </div>

  <script>
  const quizId = {{ $quiz->id }};
  const quizDuration = {{ $durationInSeconds }};
  const countdownEl = document.getElementById('time');
  const quizForm = document.getElementById('quizForm');

  const startKey = 'quiz_' + quizId + '_start';
  const answerKey = 'quiz_' + quizId;

  // Ambil jawaban yang pernah disimpan
let answers = JSON.parse(localStorage.getItem(answerKey)) || {};
let startTime = localStorage.getItem(startKey);

// Jika belum mulai atau user ingin memulai ulang, reset semuanya
const quizRestarted = !startTime || Object.keys(answers).length === 0;

if (quizRestarted) {
  localStorage.removeItem(answerKey);
  localStorage.removeItem(startKey);
  answers = {};
  startTime = Date.now();
  localStorage.setItem(startKey, startTime);
}

  const endTime = parseInt(startTime) + quizDuration * 1000;

  function updateCountdown() {
    const now = Date.now();
    const timeLeft = Math.floor((endTime - now) / 1000);

    if (timeLeft <= 0) {
      countdownEl.textContent = "00:00";
      localStorage.removeItem(answerKey);
      localStorage.removeItem(startKey);
      quizForm.submit();
    } else {
      const m = String(Math.floor(timeLeft / 60)).padStart(2, '0');
      const s = String(timeLeft % 60).padStart(2, '0');
      countdownEl.textContent = `${m}:${s}`;
    }
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);

  // Navigasi soal satu per satu
  const cards = document.querySelectorAll('.question-card');
  let currentIndex = 0;

  function showQuestion(index) {
    cards.forEach(card => card.classList.remove('active'));
    if (cards[index]) cards[index].classList.add('active');
  }

  showQuestion(currentIndex);

  // Tombol pilihan jawaban
  document.querySelectorAll('.option-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const soalId = this.dataset.soalId;
      const value = this.dataset.value;

      // Simpan ke input radio
      const radio = document.querySelector(`input[name="jawaban[${soalId}]"][value="${value}"]`);
      if (radio) radio.checked = true;

      // Simpan ke localStorage
      answers[`jawaban[${soalId}]`] = value;
      localStorage.setItem(answerKey, JSON.stringify(answers));

      // Tambah style selected
      const siblings = this.parentNode.querySelectorAll('.option-btn');
      siblings.forEach(s => s.classList.remove('selected'));
      this.classList.add('selected');

      // Pindah ke soal berikutnya
      setTimeout(() => {
        currentIndex++;
        if (currentIndex < cards.length) {
          showQuestion(currentIndex);
        } else {
          quizForm.submit();
        }
      }, 400);
    });
  });

  // Load jawaban sebelumnya
window.addEventListener('load', () => {
  if (!quizRestarted) {
    for (let name in answers) {
      const value = answers[name];
      const radio = document.querySelector(`input[name="${name}"][value="${value}"]`);
      if (radio) {
        radio.checked = true;
        const soalId = name.match(/\d+/)[0];
        const btn = document.querySelector(`.option-btn[data-soal-id="${soalId}"][data-value="${value}"]`);
        if (btn) btn.classList.add('selected');
      }
    }
  }
});


  // Flag agar tahu apakah form sudah disubmit
  quizForm.submitted = false;
  quizForm.addEventListener('submit', () => {
    quizForm.submitted = true;
    localStorage.removeItem(answerKey);
    localStorage.removeItem(startKey);
  });

  // Bersihkan jika user keluar halaman sebelum submit
  window.addEventListener('beforeunload', () => {
    if (!quizForm.submitted) {
      localStorage.removeItem(startKey);
    }
  });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>