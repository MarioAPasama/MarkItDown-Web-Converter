# MarkItDown Web Converter

A beautifully simple, web-based tool to instantly convert various document formats (PDF, Word, Excel, PowerPoint, HTML, Images, etc.) into clean Markdown. 

This project leverages Microsoft's [MarkItDown](https://github.com/microsoft/markitdown) Python library under the hood, wrapped in a sleek, modern, glassmorphism-styled web interface.

## 🌟 Features

- **Sleek UI:** Modern glassmorphism design with a responsive layout.
- **Drag & Drop:** Easily drag and drop files into the upload area.
- **Wide Format Support:** Supports PDF, DOCX, XLSX, PPTX, HTML, various image formats, and more (everything supported by the `markitdown` library).
- **Instant Conversion:** Converts files quickly and returns the Markdown output directly on the page.
- **Copy & Download:** One-click buttons to copy the markdown to your clipboard or download it as a `.md` file.
- **Asynchronous Processing:** Built with Fetch API and PHP for seamless background conversion without page reloads.

## 🛠️ Technology Stack

- **Frontend:** HTML5, CSS3 (Custom Variables, Flexbox, Animations), Vanilla JavaScript. FontAwesome for icons.
- **Backend:** PHP (`upload.php`) to handle file uploads and execute the Python script.
- **Engine:** Python (`convert.py`) utilizing the `markitdown` package.

## 🚀 Installation & Setup

### Prerequisites

1. **Web Server:** A local server environment like [Laragon](https://laragon.org/), XAMPP, or any PHP-enabled web server.
2. **Python:** Python 3.8+ installed on your system.
3. **Python Packages:** Install the `markitdown` library. If you intend to convert PDFs, make sure to install the pdf optional dependencies.
   ```bash
   pip install markitdown
   # If you need PDF support:
   pip install markitdown[pdf]
   pip install "markitdown[all]"
   ```

### Setup Instructions

1. Clone or download this repository into your web server's document root (e.g., `C:\laragon\www\markitdown-web`).
2. Ensure that your web server has the necessary permissions to:
   - Upload temporary files.
   - Execute the Python command. 
   *(Note: The PHP script calls `python`. Ensure Python is added to your system's `PATH` environment variable).*
3. Start your web server.
4. Navigate to the project directory in your browser (e.g., `http://localhost/markitdown-web/`).

## 📁 Project Structure

```text
.
├── index.html   # Main web interface (UI/UX and frontend logic)
├── upload.php   # PHP script to handle uploads and run the Python conversion
├── convert.py   # Python script that utilizes the `markitdown` package
└── README.md    # Project documentation
```

## ⚠️ Troubleshooting

- **"Python script failed to execute. Ensure Python is in your PATH."**
  - Make sure Python is correctly installed and accessible from the command line by the web server's user. You might need to edit `upload.php` to provide the absolute path to your `python.exe` (e.g., `$command = "C:\\Python311\\python.exe ..."`).
- **PDF Conversion Fails:**
  - Ensure you have installed the PDF dependencies for `markitdown` (`pip install markitdown[pdf]`).
- **File Upload Errors:**
  - Check your `php.ini` settings (`upload_max_filesize` and `post_max_size`) to ensure they are large enough to handle the files you are trying to upload.

## 📄 License

This project is open-source and free to use.
