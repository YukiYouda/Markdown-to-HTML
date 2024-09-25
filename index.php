<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown-to-HTML</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.33.0/min/vs/loader.js"></script>
</head>

<body>
    <div id="wrapper" style="display: flex;">
        <div id="container" style="width:800px;height:600px;border:1px solid #ccc;"></div>
        <div id="result" style="width:800px;height:600px;border:1px solid #ccc;">
            <form id="editorForm" action="download.php" method="post">
                <textarea id="hiddenInput" name="editorContent" style="display:none;"></textarea>
                <button type="submit" onclick="submitForm('toHTML')" style="padding: 10px 20px;">toHTML</button>
                <button type="submit" onclick="submitForm('download')" style="padding: 10px 20px;">download</button>
            </form>
        </div>
    </div>
    <script>
        require.config({
            paths: {
                'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.33.0/min/vs'
            }
        });
        require(['vs/editor/editor.main'], function() {
            editor = monaco.editor.create(document.getElementById('container'), {
                value: '',
                language: 'markdown'
            });
        });

        function submitForm(action) {
            // Monaco Editorの内容を取得
            const editorContent = editor.getValue();

             // hiddenInputに値を設定
            document.getElementById('hiddenInput').value = editorContent;

            // フォームのaction属性を設定
            const form = document.getElementById('editorForm');
            form.action = 'download.php?action=' + action;

             // フォームを送信
            form.submit();
        }
    </script>
</body>

</html>