<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your CodeIgniter App</title>
</head>
<body>
    <div id="root"></div>

    <!-- Include React dependencies from CDN -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

    <!-- Load and execute Babel from CDN (only for development, you can replace it with a local copy if needed) -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script>
        // Load and transpile NotesApp.js using Babel
        const loadAndTranspile = async () => {
            const response = await fetch('<?= base_url('public/react/src/NotesApp.js'); ?>');
            const scriptContent = await response.text();
            const transpiledContent = Babel.transform(scriptContent, { presets: ['react'] }).code;
            
            // Create a script element and set its content to the transpiled code
            const scriptElement = document.createElement('script');
            scriptElement.textContent = transpiledContent;

            // Append the script element to the document body
            document.body.appendChild(scriptElement);

            // Continue with mounting React component after transpilation
            mountReactComponent();
        };

        // Function to mount React component after transpilation
        const mountReactComponent = () => {
            const NoteApps = window.NotesApp.default; // Adjust this line based on your actual module structure

            // Mount the React component to a specific element
            ReactDOM.render(
                React.createElement(NoteApps),
                document.getElementById('root')
            );
        };

        // Call the function to load and transpile NotesApp.js
        loadAndTranspile();
    </script>
</body>
</html>
