
import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import type Editor from '@ckeditor/ckeditor5-core/src/editor/editor';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import Maximize from '../svg/maximize.svg';
import '../css/input.css'

export class Fullscreen extends Plugin {
    styles: any = {};
    isFullScreen = false;

    constructor(editor: Editor) {
        super(editor);
        this.isFullScreen = false;
        this.styles = {};
    }

    init() {
        const editor = this.editor;
        const t = editor.t;

        editor.ui.componentFactory.add('fullscreen', () => {
            const wrapperElement = editor.ui.view.element;
            const button = new ButtonView();
            button.set({
                label: 'Full screen',
                icon: Maximize,
                // withText: true,
                tooltip: true,
            });

            // Make the toolbar button appear clicked when full screen is active
            button.bind('isOn').to(this, 'isFullScreen');

            button.on('execute', () => {
                if (!this.isFullScreen) {
                    editor.ui.element?.setAttribute('id', 'fullscreeneditor');
                } else {
                    editor.ui.element?.removeAttribute('id');
                }
                this.isFullScreen = !this.isFullScreen;
                editor.editing.view.focus();
            });

            return button;
        });
    }

    _restoreStyle(writer: any, name: any, value: any, element: any) {
        value !== undefined ? writer.setStyle(name, value, element) : writer.removeStyle(name, element);
    }

    _restoreStyles(writer: any, element: any) {
        this._restoreStyle(writer, 'height', this.styles.height, element);
        this._restoreStyle(writer, 'overflow-y', this.styles['overflow-y'], element);
    }
}