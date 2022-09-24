import { IHookData } from './tyeps';

const replaceBodyClass = (data: IHookData) => {
    if (!data) {
        throw new Error('Data is undefined.');
    }

    try {
        const regexp = /<body.*\sclass=["'](.+?)["'].*>/gi,
            match = regexp.exec(data.next.html);

        if (!match || !match[1]) {
            // If no body class, remove it
            document.body.setAttribute('class', '');
        } else {
            // Set the new body class
            document.body.setAttribute('class', match[1]);
        }
    } catch (error) {
        throw new Error('Body data class was not found!');
    }
};

export default replaceBodyClass;
