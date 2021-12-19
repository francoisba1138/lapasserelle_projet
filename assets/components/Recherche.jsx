import React, { useState, useCallback, useEffect, useRef } from "react";

const Recherche = () => {
    const [query, setQuery] = useState(""); // variable d'état
    const [results, setResults] = userState([]);
    
    let timerRef = useRef(); //enregistre le timerRef

    const callApi = useCallback(() => { // useCallback permet de mémoriser la fonction
        console.log("Call API");
        fetch(`/api/lodging/search/${query}`)
            .then((response) => response.json())
            .then((data) => {
                console.log("DATA", data);
            });
    }, [query]);

    useEffect(() => { // observe query
        if (query.length > 0) {
            clearTimeout(timerRef.current); // vide le timeout
            timerRef.current = setTimeout(() => {
                callApi();
            }, 1000);
        }
    }, [query, callApi]);

    const handleChange = (e) => { 
        setQuery(e.target.value); // stocke la valeur de l'input dans query au moment du changement
    };
    return (
        <>
            <input type="text" onChange={handleChange} value={query} />;

            {results.lenght > 0 && (

            
            <ul>
                {results.map((lodging) => {
                    return (
                        <li key={lodging.id}>{lodging.title}</li>
                    )
                })}

            </ul>
        )}
        </>
};

export default Recherche;
