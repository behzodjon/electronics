
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import {  getAuth } from "firebase/auth";

const firebaseConfig = {
  apiKey: "AIzaSyDys7PhI-b0cWf8jSBPpdxK4EZZMjyS3aQ",
  authDomain: "alvah-e5a06.firebaseapp.com",
  projectId: "alvah-e5a06",
  storageBucket: "alvah-e5a06.appspot.com",
  messagingSenderId: "788463318132",
  appId: "1:788463318132:web:802960b996f057c1584d21",
  measurementId: "G-61THLMZRL9"
};


const app = initializeApp(firebaseConfig)
const analytics = getAnalytics(app)
const auth = getAuth(app)
export { auth }