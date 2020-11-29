export default class Search {

    constructor(offset) {
        this.offset = offset;
    }

    getData(path, start, term) {
        return fetch(path + '?term=' + term + '&start=' + start);
    }
}