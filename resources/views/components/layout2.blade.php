<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limit with Code</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/compiled/png/logo_transparent.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/katex/dist/katex.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.0.0/math.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/plugins/nerdamer/nerdamer.core.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Calculus.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Algebra.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Solve.js') }}"></script>
    <script src="{{ asset('assets/plugins/nerdamer/Extra.js') }}"></script>
    <script src="{{ asset('assets/plugins/katex/dist/katex.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FD98QCZN22"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FD98QCZN22');
    </script>
</head>
<body>

    <div id="app">
        <x-sidebar></x-sidebar>
        <main>
            <div id="main">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const sidebarOverlay = document.createElement("div");
        sidebarOverlay.id = "sidebar-overlay";
        document.body.appendChild(sidebarOverlay);

        const closeSidebar = document.querySelector(".close-sidebar");
        const burgerMenu2 = document.querySelector(".burger-menu2");

        function toggleSidebar() {
            sidebar.classList.toggle("active");
            sidebarOverlay.style.display = sidebar.classList.contains("active") ? "block" : "none";
        }

        sidebarOverlay.addEventListener("click", toggleSidebar);
        closeSidebar.addEventListener("click", toggleSidebar);
        burgerMenu2.addEventListener("click", toggleSidebar);
        });

        document.addEventListener('DOMContentLoaded', () => {
            const getCurrentPath = () => {
                return window.location.pathname;
            };
            const setActiveMenu = () => {
                const currentPath = getCurrentPath();
                const menuItems = document.querySelectorAll('.sidebar-item');
                menuItems.forEach(item => {
                    item.classList.remove('active');
                    const link = item.querySelector('.sidebar-link');
                    if (link) {
                        link.classList.remove('active');
                    }
                });
                menuItems.forEach(item => {
                    const link = item.querySelector('.sidebar-link');
                    if (link && link.getAttribute('href')) {
                        const menuPath = link.getAttribute('href');
                        if (menuPath && (currentPath === menuPath || currentPath.startsWith(menuPath + '/'))) {
                            item.classList.add('active');
                            link.classList.add('active');
                        }
                    }
                });
            };

            setActiveMenu();

            window.addEventListener('popstate', setActiveMenu);
        });

    </script>
    <script>

        // Javascript Run code
        const codeTextArea = document.querySelector('#exampleFormControlTextarea1');
        const outputTextArea = document.querySelectorAll('#exampleFormControlTextarea1')[1];
        const runButton = document.querySelector('.btn-dark');

        runButton.addEventListener('click', executeCode);

        function executeCode() {
            try {
                const code = codeTextArea.value;
                let output = '';
                const originalConsoleLog = console.log;
                console.log = (...args) => {
                    output += args.map(arg =>
                        typeof arg === 'object' ? JSON.stringify(arg) : String(arg)
                    ).join(' ') + '\n';
                };
                const result = eval(code);
                console.log = originalConsoleLog;
                if (output) {
                    outputTextArea.value = output;
                } else if (result !== undefined) {
                    outputTextArea.value = result;
                } else {
                    outputTextArea.value = 'Code executed successfully (no output)';
                }
            } catch (error) {
                outputTextArea.value = 'Error: ' + error.message;
            }
        }
        window.addEventListener('load', () => {
            // codeTextArea.value = '';
            outputTextArea.value = '';
        });


        // Python Run code
        const pythonCodeTextArea = document.querySelector('#exampleFormControlTextarea2');
        const pythonOutputTextArea = document.querySelectorAll('#exampleFormControlTextarea2')[1];
        const pythonRunButton = document.querySelector('#exampleFormControlTextarea2').closest('.form-group').nextElementSibling;

        let isPythonLoading = false;
        let pyodideInstance = null;
        let isSymPyInstalled = false;

        const setPythonLoading = (loading) => {
            isPythonLoading = loading;
            pythonRunButton.textContent = loading ? 'Loading...' : 'Jalankan Kode';
            pythonRunButton.disabled = loading;
            pythonCodeTextArea.disabled = loading;
        };

        const initPyodide = async () => {
            if (pyodideInstance) return pyodideInstance;
            let pyodideScript = document.querySelector('script[src*="pyodide.js"]');
            if (!pyodideScript) {

                pyodideScript = document.createElement('script');
                pyodideScript.src = "https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js";
                document.head.appendChild(pyodideScript);
            }
            try {
                await new Promise((resolve, reject) => {
                    pyodideScript.onload = resolve;
                    pyodideScript.onerror = reject;
                });
                await new Promise(resolve => setTimeout(resolve, 100));

                if (typeof loadPyodide !== 'function') {
                    throw new Error('Pyodide failed to load properly');
                }

                pyodideInstance = await loadPyodide();

                await pyodideInstance.runPythonAsync(`
                    import sys
                    import math
                    from io import StringIO

                    class OutputCapture:
                        def __init__(self):
                            self.stdout = StringIO()

                        def __enter__(self):
                            self.original_stdout = sys.stdout
                            sys.stdout = self.stdout
                            return self

                        def __exit__(self, exc_type, exc_val, exc_tb):
                            sys.stdout = self.original_stdout

                        def get_output(self):
                            return self.stdout.getvalue()

                    def run_code(code):
                        with OutputCapture() as output:
                            # Add global imports
                            if 'math' not in globals():
                                global math
                                import math
                            exec(code)
                            return output.get_output()
                `);

                return pyodideInstance;
            } catch (error) {
                console.error('Failed to initialize Pyodide:', error);
                throw error;
            }
        };


        const installSymPy = async (pyodide) => {
            if (!isSymPyInstalled) {
                pythonOutputTextArea.value = 'Installing SymPy package...';
                await pyodide.loadPackage(['sympy', 'numpy']);
                isSymPyInstalled = true;
            }
        };

        pythonRunButton.addEventListener('click', async () => {
            if (isPythonLoading) return;

            try {
                setPythonLoading(true);
                pythonOutputTextArea.value = 'Initializing Python environment...';

                const pyodide = await initPyodide();

                const code = pythonCodeTextArea.value;
                if (code.includes('sympy') || code.includes('Symbol')) {
                    await installSymPy(pyodide);
                }

                const result = await pyodide.runPythonAsync(`run_code(${JSON.stringify(code)})`);

                pythonOutputTextArea.value = result || 'Code executed successfully (no output)';

            } catch (error) {

                pythonOutputTextArea.value = 'Error: ' + error.message;
                console.error('Python execution error:', error);
            } finally {
                setPythonLoading(false);
            }
        });

        window.addEventListener('load', () => {
            if (pythonCodeTextArea && pythonOutputTextArea) {
                // pythonCodeTextArea.value = '';
                pythonOutputTextArea.value = '';
            }
        });

    </script>

</body>
</html>
