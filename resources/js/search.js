export default class Search {
    getData(path, page, term) {
        return fetch(path + '?term=' + term + '&page=' + page);
    }
}