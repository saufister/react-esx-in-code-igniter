import React from "react";
import Pencarian from "./Search";

const headerStyle ={
  
}
function Header({ onCari }) {
  return (
    <div className="note-app__header">
      <h1>Mencatat</h1>
      <Pencarian />
    </div>
  );
}
export default Header;
