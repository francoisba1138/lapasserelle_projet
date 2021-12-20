import React, { useState, useCallback, useEffect, useRef } from "react";
import Highlighter from "react-highlight-words";

const Recherche = () => {
  const [query, setQuery] = useState("");
  const [results, setResults] = useState([]);
  const [loading, setLoading] = useState(false);
  let timerRef = useRef();



function setSearchInput(event){}


  const callApi = useCallback(() => {
    fetch(`/api/lodgings/search/${query}`)
      .then((response) => response.json())
      .then((data) => {
        setResults(data);
        setLoading(false);
      });
  }, [query]);

  useEffect(() => {
    if (query.length > 0) {
      setLoading(true);
      clearTimeout(timerRef.current);
      timerRef.current = setTimeout(() => {
        callApi();
      }, 1000);
    }
  }, [query, callApi]);

  const handleChange = (e) => {
    setQuery(e.target.value);
  };

 
  return (
    <>
      <input type="text" onChange={handleChange} value={query} />
      {results.length > 0 ? (
        
     
        <ul>
       
          {results.map((lodging) => {
            return (
              <li key={lodging.id}>
                <a href={`/hebergement/${lodging.id}`}>
                  <Highlighter
                    highlightclasstitle="highlightClass"
                    searchWords={query.split(" ")}
                    autoEscape={true}
                    textToHighlight={lodging.title}
                  />
                </a>
              </li>
            );
          })}
        </ul>
      ) : query.length > 0 && !loading ? (
        <div>Aucun résultat</div>
      ) : (
        !loading && <div>Effectuez une recherche</div>
      )}
    </>
  );
};

export default Recherche;
