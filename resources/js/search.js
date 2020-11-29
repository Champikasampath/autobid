export default class Search {
    getData(path, page, term) {
        console.log(path);
        return fetch(path + 'page=' + page + '&term=' + term);
    }
}