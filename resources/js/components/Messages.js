/**
 * Messages class
 */
export default class Messages {

    /**
     * Executed when the document is ready
     * 
     * @return  {Object}
     */
    static create() {
        const instance = new this();
        instance.configure();
        return instance;
    }

    /**
     * Init helpers
     * 
     * @return {Void}
     */
    configure() {
        const userSelector = document.querySelector('#user-select');

        userSelector.addEventListener('change', (event) => {

            event.stopPropagation();
            const element = event.currentTarget;


            if (element.value == 0) {
                document.location.href = route('home');
            }

            document.location.href = route(`home`, {
                userId: element.value
            });
        });
    }
}