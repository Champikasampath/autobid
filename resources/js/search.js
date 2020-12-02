export default class Search {
    getData(path, term, sort, sort_type) {
        return fetch(path + '&term=' + term + '&sort=' + sort + '&sort_type=' + sort_type);
    }
}