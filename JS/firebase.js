  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBGFz4QGQG9KxHlyfoVtw71Zn59dKfwarc",
    authDomain: "hestens-ixl.firebaseapp.com",
    projectId: "hestens-ixl",
    storageBucket: "hestens-ixl.firebasestorage.app",
    messagingSenderId: "378383645172",
    appId: "1:378383645172:web:be7480d352f4198a8ba1a1",
    measurementId: "G-84Z3QP34DK"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);