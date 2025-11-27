<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio MVC - Herramientas Interactivas</title>
    <style>
        :root {
            --bg: #0f172a;
            --panel: #1e293b;
            --accent: #22c55e;
            --muted: #94a3b8;
            --text: #e2e8f0;
            --border: #334155;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: radial-gradient(circle at 20% 20%, rgba(34,197,94,0.12), transparent 25%),
                radial-gradient(circle at 80% 10%, rgba(59,130,246,0.15), transparent 20%),
                radial-gradient(circle at 50% 90%, rgba(139,92,246,0.1), transparent 25%),
                var(--bg);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--text);
            min-height: 100vh;
        }

        header {
            padding: 32px 24px 12px;
            text-align: center;
        }

        h1 { margin: 0; font-size: 32px; letter-spacing: -0.5px; }
        p.lead { margin: 8px 0 0; color: var(--muted); }

        main { padding: 24px; max-width: 1200px; margin: 0 auto 48px; }

        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 16px; }

        .card {
            background: linear-gradient(160deg, rgba(255,255,255,0.02), rgba(255,255,255,0)), var(--panel);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.25);
        }

        .card h2 { margin-top: 0; display: flex; align-items: center; gap: 8px; font-size: 18px; }
        .card h2 span { font-size: 22px; }
        .muted { color: var(--muted); font-size: 14px; margin: 4px 0 12px; }

        input, select, button, textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.02);
            color: var(--text);
            font-size: 14px;
        }

        button {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            color: #0f172a;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        button:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(34,197,94,0.2); }
        button.secondary { background: rgba(255,255,255,0.05); color: var(--text); border: 1px solid var(--border); box-shadow: none; }

        .list { list-style: none; padding: 0; margin: 8px 0 0; display: grid; gap: 8px; }
        .list li { padding: 10px 12px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 10px; display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .chip { padding: 6px 10px; border-radius: 999px; border: 1px solid var(--border); background: rgba(255,255,255,0.05); font-size: 12px; color: var(--muted); }

        .grid-two { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 8px; }

        .progress {
            height: 10px;
            background: rgba(255,255,255,0.05);
            border-radius: 999px;
            overflow: hidden;
            margin-top: 6px;
        }

        .progress span { display: block; height: 100%; background: linear-gradient(90deg, #22c55e, #16a34a); }

        .memory-grid { display: grid; grid-template-columns: repeat(4, minmax(60px, 1fr)); gap: 8px; }
        .memory-card { background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 12px; height: 70px; font-size: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background 0.15s ease, transform 0.1s ease; }
        .memory-card.revealed { background: rgba(34,197,94,0.15); transform: scale(1.02); }
        .memory-card.matched { background: rgba(34,197,94,0.25); }

        .poll-options { display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 8px; }
        .flex-row { display: flex; gap: 8px; align-items: center; }
        .flex-row button { flex: 1; }
    </style>
</head>
<body>
<header>
    <h1>Panel de ejercicios MVC</h1>
    <p class="lead">Implementación de 10 herramientas prácticas solicitadas para la evaluación final.</p>
</header>
<main>
    <div class="grid">
        <section class="card" id="todo-card">
            <h2><span>✅</span>Lista de Tareas</h2>
            <p class="muted">Añade pendientes, complétalos o elimínalos rápidamente.</p>
            <div class="grid-two">
                <input id="todo-input" placeholder="Nueva tarea" aria-label="Nueva tarea">
                <button id="todo-add">Agregar</button>
            </div>
            <ul class="list" id="todo-list"></ul>
        </section>

        <section class="card" id="tip-card">
            <h2><span>🧮</span>Calculadora de Propinas</h2>
            <p class="muted">Calcula propina y total según consumo.</p>
            <label>Monto de la cuenta</label>
            <input id="bill-amount" type="number" min="0" step="0.01" placeholder="0.00">
            <label>Porcentaje de propina (%)</label>
            <input id="tip-percent" type="number" min="0" max="100" step="1" value="10">
            <div class="grid-two" style="margin-top:8px;">
                <div>
                    <div class="muted">Propina</div>
                    <strong id="tip-value">$0.00</strong>
                </div>
                <div>
                    <div class="muted">Total</div>
                    <strong id="bill-total">$0.00</strong>
                </div>
            </div>
        </section>

        <section class="card" id="password-card">
            <h2><span>🔒</span>Generador de Contraseñas</h2>
            <p class="muted">Crea claves robustas según tus preferencias.</p>
            <label>Longitud</label>
            <input id="pass-length" type="number" min="6" max="32" value="12">
            <div class="grid-two" style="margin:10px 0;">
                <label><input type="checkbox" id="pass-upper" checked> Mayúsculas</label>
                <label><input type="checkbox" id="pass-symbol" checked> Símbolos</label>
            </div>
            <button id="pass-generate">Generar contraseña</button>
            <input id="pass-output" readonly style="margin-top:8px;">
        </section>

        <section class="card" id="expense-card">
            <h2><span>💰</span>Gestor de Gastos</h2>
            <p class="muted">Registra compras y sigue tu presupuesto.</p>
            <div class="grid-two">
                <input id="expense-desc" placeholder="Descripción">
                <input id="expense-amount" type="number" min="0" step="0.01" placeholder="$">
            </div>
            <div class="grid-two" style="margin-top:8px;">
                <input id="budget" type="number" min="0" step="0.01" placeholder="Presupuesto" value="500">
                <button id="expense-add">Guardar gasto</button>
            </div>
            <div class="muted" id="expense-summary">Sin gastos aún</div>
            <ul class="list" id="expense-list"></ul>
        </section>

        <section class="card" id="booking-card">
            <h2><span>📅</span>Sistema de Reservas</h2>
            <p class="muted">Agenda citas o reservaciones y revisa disponibilidad.</p>
            <div class="grid-two">
                <input id="reserve-name" placeholder="Nombre">
                <input id="reserve-date" type="date">
            </div>
            <div class="grid-two" style="margin-top:8px;">
                <input id="reserve-time" type="time">
                <input id="reserve-people" type="number" min="1" value="2" placeholder="Personas">
            </div>
            <button id="reserve-add" style="margin-top:8px;">Registrar reserva</button>
            <ul class="list" id="reserve-list"></ul>
        </section>

        <section class="card" id="habit-card">
            <h2><span>📈</span>Seguimiento de Hábitos</h2>
            <p class="muted">Controla hábitos diarios y visualiza tu racha.</p>
            <div class="grid-two">
                <input id="habit-name" placeholder="Hábito">
                <button id="habit-add">Añadir hábito</button>
            </div>
            <ul class="list" id="habit-list"></ul>
        </section>

        <section class="card" id="music-card">
            <h2><span>🎵</span>Reproductor de Música</h2>
            <p class="muted">Demo con tono sintético para reproducir/pausar.</p>
            <select id="music-track">
                <option value="440">Melodía base (440 Hz)</option>
                <option value="523">Acorde brillante (523 Hz)</option>
                <option value="659">Arpegio suave (659 Hz)</option>
            </select>
            <div class="grid-two" style="margin-top:10px;">
                <button id="music-play">Reproducir</button>
                <button id="music-stop" class="secondary">Pausar</button>
            </div>
            <div class="muted" id="music-status">Silencio</div>
        </section>

        <section class="card" id="memory-card">
            <h2><span>🧠</span>Juego de Memoria</h2>
            <p class="muted">Encuentra las parejas con el menor número de movimientos.</p>
            <div class="memory-grid" id="memory-grid"></div>
            <div class="flex-row" style="margin-top:10px;">
                <div class="chip" id="memory-stats">Movimientos: 0 · Aciertos: 0</div>
                <button id="memory-reset" class="secondary" style="max-width: 140px;">Reiniciar</button>
            </div>
        </section>

        <section class="card" id="event-card">
            <h2><span>🎉</span>Planificador de Eventos</h2>
            <p class="muted">Organiza eventos, invitaciones y confirma asistencia.</p>
            <input id="event-title" placeholder="Título del evento">
            <div class="grid-two" style="margin-top:8px;">
                <input id="event-date" type="datetime-local">
                <input id="event-location" placeholder="Lugar">
            </div>
            <button id="event-add" style="margin-top:8px;">Crear evento</button>
            <ul class="list" id="event-list"></ul>
        </section>

        <section class="card" id="poll-card">
            <h2><span>📊</span>Plataforma de Encuestas</h2>
            <p class="muted">Crea encuestas y contabiliza votos en vivo.</p>
            <input id="poll-question" placeholder="Pregunta">
            <input id="poll-options" placeholder="Opciones separadas por coma" style="margin-top:6px;">
            <button id="poll-create" style="margin-top:8px;">Publicar encuesta</button>
            <div id="poll-list" style="margin-top:10px; display: grid; gap: 12px;"></div>
        </section>

        <section class="card" id="timer-card">
            <h2><span>⏱️</span>Cronómetro en línea</h2>
            <p class="muted">Inicia, pausa y registra vueltas.</p>
            <div style="font-size:32px; font-weight:700; text-align:center; margin:8px 0;" id="timer-display">00:00.0</div>
            <div class="grid-two">
                <button id="timer-start">Iniciar</button>
                <button id="timer-reset" class="secondary">Reiniciar</button>
            </div>
            <button id="timer-lap" style="margin-top:8px;">Registrar vuelta</button>
            <ul class="list" id="timer-laps"></ul>
        </section>
    </div>
</main>
<script>
    // Lista de tareas
    const todoInput = document.getElementById('todo-input');
    const todoList = document.getElementById('todo-list');
    document.getElementById('todo-add').addEventListener('click', () => {
        if (!todoInput.value.trim()) return;
        const li = document.createElement('li');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        const span = document.createElement('span');
        span.textContent = todoInput.value.trim();
        const remove = document.createElement('button');
        remove.textContent = 'Eliminar';
        remove.className = 'secondary';
        remove.style.maxWidth = '100px';
        checkbox.addEventListener('change', () => {
            span.style.textDecoration = checkbox.checked ? 'line-through' : 'none';
            span.style.color = checkbox.checked ? 'var(--muted)' : 'var(--text)';
        });
        remove.addEventListener('click', () => li.remove());
        li.append(checkbox, span, remove);
        todoList.prepend(li);
        todoInput.value = '';
    });

    // Calculadora de propinas
    const billAmount = document.getElementById('bill-amount');
    const tipPercent = document.getElementById('tip-percent');
    const tipValue = document.getElementById('tip-value');
    const billTotal = document.getElementById('bill-total');
    const updateTip = () => {
        const amount = parseFloat(billAmount.value) || 0;
        const percent = parseFloat(tipPercent.value) || 0;
        const tip = amount * (percent / 100);
        const total = amount + tip;
        tipValue.textContent = `$${tip.toFixed(2)}`;
        billTotal.textContent = `$${total.toFixed(2)}`;
    };
    billAmount.addEventListener('input', updateTip);
    tipPercent.addEventListener('input', updateTip);
    updateTip();

    // Generador de contraseñas
    const passLength = document.getElementById('pass-length');
    const passUpper = document.getElementById('pass-upper');
    const passSymbol = document.getElementById('pass-symbol');
    const passOutput = document.getElementById('pass-output');
    document.getElementById('pass-generate').addEventListener('click', () => {
        const lower = 'abcdefghijklmnopqrstuvwxyz';
        const upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const numbers = '0123456789';
        const symbols = '!@#$%^&*()_+-=<>?';
        let pool = lower + numbers;
        if (passUpper.checked) pool += upper;
        if (passSymbol.checked) pool += symbols;
        const len = Math.max(6, Math.min(32, parseInt(passLength.value, 10) || 12));
        let result = '';
        for (let i = 0; i < len; i++) {
            result += pool[Math.floor(Math.random() * pool.length)];
        }
        passOutput.value = result;
    });

    // Gestor de gastos
    const expenses = [];
    const expenseList = document.getElementById('expense-list');
    const expenseSummary = document.getElementById('expense-summary');
    const renderExpenses = () => {
        expenseList.innerHTML = '';
        let total = 0;
        expenses.forEach((item) => {
            total += item.amount;
            const li = document.createElement('li');
            li.innerHTML = `<strong>${item.desc}</strong><span class="chip">$${item.amount.toFixed(2)}</span>`;
            expenseList.append(li);
        });
        const budget = parseFloat(document.getElementById('budget').value) || 0;
        const diff = budget - total;
        expenseSummary.textContent = `Total gastado: $${total.toFixed(2)} · Presupuesto restante: $${diff.toFixed(2)}`;
    };
    document.getElementById('expense-add').addEventListener('click', () => {
        const desc = document.getElementById('expense-desc').value.trim();
        const amount = parseFloat(document.getElementById('expense-amount').value);
        if (!desc || isNaN(amount)) return;
        expenses.push({ desc, amount });
        document.getElementById('expense-desc').value = '';
        document.getElementById('expense-amount').value = '';
        renderExpenses();
    });

    // Sistema de reservas
    const reserves = [];
    const reserveList = document.getElementById('reserve-list');
    const renderReserves = () => {
        reserveList.innerHTML = '';
        reserves.sort((a, b) => a.datetime.localeCompare(b.datetime)).forEach((item) => {
            const li = document.createElement('li');
            li.innerHTML = `<div><strong>${item.name}</strong><div class="muted">${item.date} · ${item.time}</div></div><span class="chip">${item.people} pax</span>`;
            reserveList.append(li);
        });
    };
    document.getElementById('reserve-add').addEventListener('click', () => {
        const name = document.getElementById('reserve-name').value.trim();
        const date = document.getElementById('reserve-date').value;
        const time = document.getElementById('reserve-time').value;
        const people = parseInt(document.getElementById('reserve-people').value, 10) || 1;
        if (!name || !date || !time) return;
        reserves.push({ name, date, time, people, datetime: `${date}T${time}` });
        document.getElementById('reserve-name').value = '';
        renderReserves();
    });

    // Seguimiento de hábitos
    const habits = [];
    const habitList = document.getElementById('habit-list');
    const renderHabits = () => {
        habitList.innerHTML = '';
        habits.forEach((habit, index) => {
            const li = document.createElement('li');
            const info = document.createElement('div');
            info.innerHTML = `<strong>${habit.name}</strong><div class="progress"><span style="width:${Math.min(habit.streak, 21)/21*100}%"></span></div><small class="muted">Racha: ${habit.streak} días</small>`;
            const btn = document.createElement('button');
            btn.textContent = 'Marcar hoy';
            btn.style.maxWidth = '120px';
            btn.addEventListener('click', () => {
                habit.streak += 1;
                renderHabits();
            });
            const reset = document.createElement('button');
            reset.textContent = 'Reiniciar';
            reset.className = 'secondary';
            reset.style.maxWidth = '100px';
            reset.addEventListener('click', () => {
                habit.streak = 0;
                renderHabits();
            });
            li.append(info, btn, reset);
            habitList.append(li);
        });
    };
    document.getElementById('habit-add').addEventListener('click', () => {
        const name = document.getElementById('habit-name').value.trim();
        if (!name) return;
        habits.push({ name, streak: 0 });
        document.getElementById('habit-name').value = '';
        renderHabits();
    });

    // Reproductor de música (tono sintético)
    let audioCtx;
    let oscillator;
    const musicStatus = document.getElementById('music-status');
    document.getElementById('music-play').addEventListener('click', () => {
        if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        const frequency = parseInt(document.getElementById('music-track').value, 10) || 440;
        if (oscillator) oscillator.stop();
        oscillator = audioCtx.createOscillator();
        const gainNode = audioCtx.createGain();
        oscillator.type = 'sine';
        oscillator.frequency.value = frequency;
        gainNode.gain.value = 0.08;
        oscillator.connect(gainNode).connect(audioCtx.destination);
        oscillator.start();
        musicStatus.textContent = `Reproduciendo tono ${frequency}Hz`;
    });
    document.getElementById('music-stop').addEventListener('click', () => {
        if (oscillator) {
            oscillator.stop();
            oscillator = null;
            musicStatus.textContent = 'Silencio';
        }
    });

    // Juego de memoria
    const memoryGrid = document.getElementById('memory-grid');
    const memoryStats = document.getElementById('memory-stats');
    let memoryCards = [];
    let flipped = [];
    let matches = 0;
    let moves = 0;
    const memoryEmojis = ['🍎','🍋','🍇','🍉','🍒','🍍'];
    const setupMemory = () => {
        memoryGrid.innerHTML = '';
        matches = 0; moves = 0; flipped = [];
        memoryCards = [...memoryEmojis, ...memoryEmojis]
            .sort(() => Math.random() - 0.5)
            .map((emoji, index) => ({ id: index, emoji, matched: false }));
        memoryCards.forEach((card) => {
            const btn = document.createElement('button');
            btn.className = 'memory-card';
            btn.dataset.id = card.id;
            btn.textContent = '❔';
            btn.addEventListener('click', () => handleMemoryClick(card, btn));
            memoryGrid.append(btn);
        });
        updateMemoryStats();
    };
    const updateMemoryStats = () => {
        memoryStats.textContent = `Movimientos: ${moves} · Aciertos: ${matches}`;
    };
    const handleMemoryClick = (card, element) => {
        if (card.matched || flipped.length === 2 || flipped.some(f => f.card.id === card.id)) return;
        element.classList.add('revealed');
        element.textContent = card.emoji;
        flipped.push({ card, element });
        if (flipped.length === 2) {
            moves += 1;
            const [first, second] = flipped;
            if (first.card.emoji === second.card.emoji) {
                first.element.classList.add('matched');
                second.element.classList.add('matched');
                first.card.matched = second.card.matched = true;
                matches += 1;
                flipped = [];
                updateMemoryStats();
                return;
            }
            setTimeout(() => {
                flipped.forEach(({ element: el }) => {
                    el.classList.remove('revealed');
                    el.textContent = '❔';
                });
                flipped = [];
            }, 700);
        }
        updateMemoryStats();
    };
    document.getElementById('memory-reset').addEventListener('click', setupMemory);
    setupMemory();

    // Planificador de eventos
    const events = [];
    const eventList = document.getElementById('event-list');
    const renderEvents = () => {
        eventList.innerHTML = '';
        events.sort((a, b) => (a.datetime || '').localeCompare(b.datetime || '')).forEach((evt) => {
            const li = document.createElement('li');
            const info = document.createElement('div');
            info.innerHTML = `<strong>${evt.title}</strong><div class="muted">${evt.date || 'Sin fecha'} · ${evt.location || 'Lugar pendiente'}</div>`;
            const chip = document.createElement('span');
            chip.className = 'chip';
            chip.textContent = `${evt.confirmed} confirmados`;
            const confirm = document.createElement('button');
            confirm.textContent = 'Confirmar asistencia';
            confirm.style.maxWidth = '160px';
            confirm.addEventListener('click', () => {
                evt.confirmed += 1;
                renderEvents();
            });
            li.append(info, chip, confirm);
            eventList.append(li);
        });
    };
    document.getElementById('event-add').addEventListener('click', () => {
        const title = document.getElementById('event-title').value.trim();
        const date = document.getElementById('event-date').value;
        const location = document.getElementById('event-location').value.trim();
        if (!title) return;
        events.push({ title, date, location, confirmed: 0, datetime: date });
        document.getElementById('event-title').value = '';
        document.getElementById('event-location').value = '';
        renderEvents();
    });

    // Plataforma de encuestas
    const pollList = document.getElementById('poll-list');
    const polls = [];
    const renderPolls = () => {
        pollList.innerHTML = '';
        polls.forEach((poll, pollIndex) => {
            const card = document.createElement('div');
            card.className = 'card';
            card.style.padding = '12px';
            card.innerHTML = `<strong>${poll.question}</strong>`;
            const optionsWrapper = document.createElement('div');
            optionsWrapper.className = 'poll-options';
            poll.options.forEach((opt, optIndex) => {
                const btn = document.createElement('button');
                btn.textContent = `${opt.label} (${opt.votes})`;
                btn.addEventListener('click', () => {
                    polls[pollIndex].options[optIndex].votes += 1;
                    renderPolls();
                });
                optionsWrapper.append(btn);
            });
            card.append(optionsWrapper);
            pollList.append(card);
        });
    };
    document.getElementById('poll-create').addEventListener('click', () => {
        const question = document.getElementById('poll-question').value.trim();
        const options = document.getElementById('poll-options').value.split(',').map(o => o.trim()).filter(Boolean);
        if (!question || options.length < 2) return;
        polls.push({ question, options: options.map(label => ({ label, votes: 0 })) });
        document.getElementById('poll-question').value = '';
        document.getElementById('poll-options').value = '';
        renderPolls();
    });

    // Cronómetro
    const timerDisplay = document.getElementById('timer-display');
    const timerLaps = document.getElementById('timer-laps');
    let timerInterval = null;
    let startTime = null;
    let elapsed = 0;
    const formatTime = (ms) => {
        const totalSeconds = Math.floor(ms / 1000);
        const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
        const seconds = String(totalSeconds % 60).padStart(2, '0');
        const tenths = Math.floor((ms % 1000) / 100);
        return `${minutes}:${seconds}.${tenths}`;
    };
    const updateTimer = () => {
        const now = Date.now();
        const diff = now - startTime + elapsed;
        timerDisplay.textContent = formatTime(diff);
    };
    document.getElementById('timer-start').addEventListener('click', () => {
        if (timerInterval) return;
        startTime = Date.now();
        timerInterval = setInterval(updateTimer, 100);
    });
    document.getElementById('timer-reset').addEventListener('click', () => {
        clearInterval(timerInterval);
        timerInterval = null;
        elapsed = 0;
        timerDisplay.textContent = '00:00.0';
        timerLaps.innerHTML = '';
    });
    document.getElementById('timer-lap').addEventListener('click', () => {
        if (!timerInterval) return;
        const now = Date.now();
        const diff = now - startTime + elapsed;
        const li = document.createElement('li');
        li.textContent = `Vuelta ${timerLaps.children.length + 1}: ${formatTime(diff)}`;
        timerLaps.prepend(li);
    });
</script>
</body>
</html><?php /**PATH C:\Users\user\Desktop\tallerfinalphp\tallerfinal-php\resources\views/welcome.blade.php ENDPATH**/ ?>