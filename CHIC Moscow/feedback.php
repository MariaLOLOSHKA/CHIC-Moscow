
            right: 20px;
            width: 300px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            display: none;
            z-index: 1000;
        }
        #feedback-trigger {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #C684A6;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
        }
    </style>
</head>
<body>
    <h1>Добро пожаловать в CHIC Moscow!</h1>

    <div id="feedback-widget">
        <div style="background: #C684A6; color: white; padding: 15px; text-align: center;">
            Задайте нам вопросы!
        </div>
        <div style="padding: 15px;">
            <form method="POST">
                <textarea name="message" placeholder="Ваш вопрос..." style="width: 100%; height: 100px;" required></textarea>
                <button type="submit" style="
                    background: #C684A6;
                    color: white;
                    border: none;
                    padding: 10px;
                    width: 100%;
                    border-radius: 6px;
                    cursor: pointer;
                ">
                    Отправить
                </button>
            </form>
        </div>
    </div>

    <div id="feedback-trigger">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
    </div>

    <script>
        document.getElementById('feedback-trigger').addEventListener('click', function() {
            const widget = document.getElementById('feedback-widget');
            widget.style.display = widget.style.display === 'none' ? 'block' : 'none';
        });
    </script>

    <?php if (isset($success)): ?>
        <script>alert('<?= $success ?>');</script>
    <?php endif; ?>
</body>
</html>