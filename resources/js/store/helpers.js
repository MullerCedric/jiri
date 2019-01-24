// Based on:
// https://gist.github.com/rhythnic/6521495650a215ccab8bf7120949fb7d
// https://forum.vuejs.org/t/vuex-drying-up-mutations/41649/2

// *******************************************************************
// Getters
// *******************************************************************

// Find an object in a list of objects by matching a property value.
// userById: findByKey('users', 'id')
// getters.userById('123')
export function findByKey (prop, targetKey) {
    return state => val => state[prop].find(x => x[targetKey] === val);
}

// Filter a list of objects by matching a property value.
// usersByStatus: filterByKey('users', 'status')
// getters.usersByStatus('INACTIVE')
export function filterByKey (prop, targetKey) {
    return state => vals => {
        if (!Array.isArray(vals)) vals = [vals];
        return state[prop].filter(x => vals.indexOf(x[targetKey]) > -1);
    }
}


// *******************************************************************
// Mutations
// *******************************************************************

// Set property on state
// setUser: set(state, payload)
// commit('setUser', ['user.age', 50])
export function set(state, [pathString, val]) {
    const path = pathString.split(/[[.]/);
    path.reduce((memo, key, i) => {
        const isArray = path[i + 1] && path[i + 1].includes(']');
        key = key.replace(']', '');
        if (i + 1 === path.length){
            Vue.set(memo, key, val)
        } else if (!memo.hasOwnProperty(key)){
            if (isArray){
                Vue.set(memo, key, []);
            } else {
                Vue.set(memo, key, {});
            }
        }
        return memo[key]
    }, state)
}

// Toggle boolean in state
// toggleOpen: toggle('open')
// commit('toggleOpen')
export const toggle = key => state => { state[key] = !state[key] };

// push an item onto a list
// addItem: pushTo('items')
// commit('addItem', { name: 'foo' } )
export const pushTo = key => (state, val) => state[key].push(val);
