<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller MVC</title>
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

        .hidden { display: none; }

        .tool-nav { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 10px; max-width: 960px; margin: 0 auto; padding: 0 24px 12px; }
        .tool-nav button { background: rgba(255,255,255,0.06); border: 1px solid var(--border); color: var(--text); }
        .tool-nav button.active { background: linear-gradient(135deg, #22c55e, #16a34a); color: #0f172a; }

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
    <h1>Taller MVC</h1>
    <p class="lead">Selecciona una herramienta a la vez para explorarlas por separado.</p>
</header>
<div class="tool-nav" aria-label="Navegación de herramientas">
    <button class="tool-tab active" data-target="todo-card">Lista de Tareas</button>
    <button class="tool-tab" data-target="tip-card">Calculadora de Propinas</button>
    <button class="tool-tab" data-target="password-card">Generador de Contraseñas</button>
    <button class="tool-tab" data-target="expense-card">Gestor de Gastos</button>
    <button class="tool-tab" data-target="booking-card">Sistema de Reservas</button>
    <button class="tool-tab" data-target="notes-card">Bloc de Notas</button>
    <button class="tool-tab" data-target="memory-card">Juego de Memoria</button>
    <button class="tool-tab" data-target="event-card">Planificador de Eventos</button>
    <button class="tool-tab" data-target="recipe-card">Plataforma de Recetas</button>
    <button class="tool-tab" data-target="timer-card">Cronómetro</button>
</div>
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

        <section class="card hidden" id="notes-card">
            <h2><span>📝</span>Bloc de Notas</h2>
            <p class="muted">Captura apuntes rápidos y consúltalos cuando los necesites.</p>
            <input id="note-title" placeholder="Título de la nota">
            <textarea id="note-body" rows="3" placeholder="Contenido"></textarea>
            <div class="grid-two" style="margin-top:8px;">
                <button id="note-add">Guardar nota</button>
                <button id="note-clear" class="secondary">Limpiar campos</button>
            </div>
            <ul class="list" id="note-list"></ul>
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

         <section class="card hidden" id="recipe-card">
            <h2><span>🍳</span>Plataforma de Recetas</h2>
            <p class="muted">Guarda recetas con ingredientes y pasos detallados.</p>
            <input id="recipe-name" placeholder="Nombre de la receta">
            <textarea id="recipe-ingredients" rows="2" placeholder="Ingredientes (separados por comas)"></textarea>
            <textarea id="recipe-steps" rows="3" placeholder="Pasos"></textarea>
            <button id="recipe-add" style="margin-top:8px;">Agregar receta</button>
            <ul class="list" id="recipe-list"></ul>
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
    const tabs = document.querySelectorAll('.tool-tab');
    const cards = document.querySelectorAll('.card');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const target = tab.dataset.target;
            cards.forEach(card => {
                card.classList.toggle('hidden', card.id !== target);
            });
        });
    });
    const activeTab = document.querySelector('.tool-tab.active');
    if (activeTab) activeTab.click();

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

            // Bloc de notas
    const notes = [];
    const noteList = document.getElementById('note-list');
    const renderNotes = () => {
        noteList.innerHTML = '';
        if (!notes.length) {
            const li = document.createElement('li');
            li.textContent = 'Aún no hay apuntes';
            noteList.append(li);
            return;
        }
        notes.forEach((note, index) => {
            const li = document.createElement('li');
            const info = document.createElement('div');
            info.innerHTML = `<strong>${note.title || 'Sin título'}</strong><div class="muted">${note.body}</div>`;
            const remove = document.createElement('button');
            remove.textContent = 'Eliminar';
            remove.className = 'secondary';
            remove.style.maxWidth = '100px';
            remove.addEventListener('click', () => {
                notes.splice(index, 1);
                renderNotes();
            });
            li.append(info, remove);
            noteList.append(li);
        });
    };
    document.getElementById('note-add').addEventListener('click', () => {
        const title = document.getElementById('note-title').value.trim();
        const body = document.getElementById('note-body').value.trim();
        if (!body && !title) return;
        notes.unshift({ title, body });
        document.getElementById('note-title').value = '';
        document.getElementById('note-body').value = '';
        renderNotes();
    });
    document.getElementById('note-clear').addEventListener('click', () => {
        document.getElementById('note-title').value = '';
        document.getElementById('note-body').value = '';
    });
    renderNotes();

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

        // Plataforma de recetas
    const recipeList = document.getElementById('recipe-list');
    const recipes = [];
    const renderRecipes = () => {
        recipeList.innerHTML = '';
        if (!recipes.length) {
            const li = document.createElement('li');
            li.textContent = 'Aún no hay recetas guardadas';
            recipeList.append(li);
            return;
        }
        recipes.forEach((recipe) => {
            const li = document.createElement('li');
            const info = document.createElement('div');
            const ingredients = recipe.ingredients.length ? recipe.ingredients.join(', ') : 'Sin ingredientes';
            info.innerHTML = `<strong>${recipe.name || 'Receta sin nombre'}</strong><div class="muted">Ingredientes: ${ingredients}</div><div class="muted">Pasos: ${recipe.steps}</div>`;
            li.append(info);
            recipeList.append(li);
        });
    };
        document.getElementById('recipe-add').addEventListener('click', () => {
        const name = document.getElementById('recipe-name').value.trim();
        const ingredientsInput = document.getElementById('recipe-ingredients').value.trim();
        const steps = document.getElementById('recipe-steps').value.trim();
        if (!name && !ingredientsInput && !steps) return;
        const ingredients = ingredientsInput ? ingredientsInput.split(',').map(i => i.trim()).filter(Boolean) : [];
        recipes.unshift({ name, ingredients, steps });
        document.getElementById('recipe-name').value = '';
        document.getElementById('recipe-ingredients').value = '';
        document.getElementById('recipe-steps').value = '';
        renderRecipes();
    });
    renderRecipes();

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
</html>