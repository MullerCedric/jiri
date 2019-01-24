/*
 * Commonly used key-words :
 * SET (mutation): set the store data to given payload
 * SET (action): set the store data to given payload, without AJAX
 * SAVE (action): save the data with AJAX into the DB, then eventually update the store (set)
 * FETCH (action): fetch some data with AJAX, then set the store (to save it)
 * GET (getter): get specific sub-data from the store OR computed value stored in the state for Two-Way-Binding
 */

/*
 * Examination
 */
// Getters
export const GET_EXAMINATION_PROP = 'Examination/getProp';
// Mutations
export const SET_EXAMINATION = 'Examination/setExamination'; //Mutation & Action
export const RESET_EXAMINATION = 'Examination/resetExamination';
// Actions
export const FETCH_EXAMINATIONS = 'Examination/fetchExaminations';
export const SAVE_EXAMINATION = 'Examination/saveExamination';
export const FETCH_CURRENT_USER_AS_EXAMINER = 'Examination/fetchCurrentUserAsExaminer';

/*
 * Mark
 */
// Mutations
export const SET_MARK = 'Mark/setMark';
// Actions
export const FETCH_MARKS_FOR_CURRENTLY_MANAGED_EXAMINATIONS = 'Mark/fetchMarksForCurrentlyManagedExaminations';

/*
 * User
 */
// Mutation
export const SET_USER = 'User/setUser';
// Actions
export const FETCH_ACTIVE_USERS = 'User/fetchActiveUsers';
export const SAVE_USER = 'User/saveUser';

/*
 * Weighting
 */
// Getters
export const GET_CUSTOM_WEIGHTING = 'Weighting/getCustomWeighting';
export const GET_CUSTOM_WEIGHTING_FOR_USER = 'Weighting/getCustomWeightingForUser';
// Mutations
export const PUSH_CUSTOM_WEIGHTING = 'Weighting/pushCustomWeighting';
export const SET_CUSTOM_WEIGHTING_PROP = 'Weighting/setCustomWeightingProp';
export const REMOVE_CUSTOM_WEIGHTING = 'Weighting/removeCustomWeighting'; //Mutation & Action
// Actions
export const PUSH_OR_SET_CUSTOM_WEIGHTING = 'Weighting/pushOrSetCustomWeighting';
