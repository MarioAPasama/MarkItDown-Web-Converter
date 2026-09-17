import sys
from markitdown import MarkItDown

def main():
    if len(sys.argv) < 2:
        print("Error: No file path provided.", file=sys.stderr)
        sys.exit(1)
        
    file_path = sys.argv[1]
    
    try:
        md = MarkItDown()
        result = md.convert(file_path)
        sys.stdout.reconfigure(encoding='utf-8')
        sys.stderr.reconfigure(encoding='utf-8')
        print(result.text_content)
    except Exception as e:
        print(f"Error converting file: {str(e)}", file=sys.stderr)
        sys.exit(1)

if __name__ == '__main__':
    main()
