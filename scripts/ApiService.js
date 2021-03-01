export const getBookByName = name => {
    return fetch(`https://www.googleapis.com/books/v1/volumes?q=${name}&key=AIzaSyD9_ZZl6jzhesBW2foTM7NLg2yFSmPYViE`)
    .then(resp => resp.json());
}

export const getBookById = id => {
    return fetch(`https://www.googleapis.com/books/v1/volumes/${id}?key=AIzaSyD9_ZZl6jzhesBW2foTM7NLg2yFSmPYViE`)
    .then(resp => resp.json());
}
