export default class Search {
    getData(path, term) {
        return fetch(path + '&term=' + term);
    }
}