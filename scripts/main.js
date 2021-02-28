import { getBookByName, getBookById } from './ApiService.js';
import { mapListToDOMElements, createDOMElem } from './DOMActions.js';

class BookstoreApp {
    constructor() {
        this.viewElems = {};
        this.selectedName = {};
        this.initializeApp();
    }

    initializeApp = () => {

    }
}

document.addEventListener('DOMContentLoaded', new BookstoreApp());
