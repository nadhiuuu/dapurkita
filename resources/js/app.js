import {
    BlockQuote,
    Bold,
    ClassicEditor,
    Essentials,
    Heading,
    HorizontalLine,
    Italic,
    Link,
    List,
    Paragraph,
    Strikethrough,
    Underline,
} from 'ckeditor5';
import 'ckeditor5/ckeditor5.css';

const initializeArticleEditor = () => {
    const sourceElement = document.querySelector('#content-editor');

    if (!sourceElement) {
        return;
    }

    ClassicEditor.create(sourceElement, {
        licenseKey: 'GPL',
        plugins: [
            Essentials,
            Paragraph,
            Heading,
            Bold,
            Italic,
            Underline,
            Strikethrough,
            List,
            Link,
            BlockQuote,
            HorizontalLine,
        ],
        toolbar: [
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            '|',
            'bulletedList',
            'numberedList',
            'link',
            'blockQuote',
            'horizontalLine',
            '|',
            'undo',
            'redo',
        ],
    }).then((editor) => {
        const form = sourceElement.closest('form');

        form?.addEventListener('submit', () => {
            editor.updateSourceElement();
        });
    }).catch((error) => {
        console.error('CKEditor initialization failed.', error);
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeArticleEditor);
} else {
    initializeArticleEditor();
}
