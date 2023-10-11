import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';

export class Timestamp extends Plugin {
    init() {
        const editor = this.editor;
        // The button must be registered among the UI components of the editor
        // to be displayed in the toolbar.
        editor.ui.componentFactory.add('timestamp', () => {
            // The button will be an instance of ButtonView.
            const button = new ButtonView();

            button.set({
                label: 'Timestamp',
                withText: true
            });

            // Execute a callback function when the button is clicked.
            button.on('execute', () => {
                const now = new Date();

                // Change the model using the model writer.
                editor.model.change(writer => {

                    // Insert the text at the user's current position.
                    editor.model.insertContent(writer.createText(now.toString()));
                });
            });

            return button;
        });
    }
}