<x-app-layout>

    <script src="/js/felugroAblakValidalas.js" type="module" defer></script>

    <form action="{{url($hova)}}"  id="joform">
        <label for="jovahagyas">Írja be az igen szót, ha jóváhagyja a műveletet:</label><br>
      <input type="text" id="approval" name="approval"><br>
    
        <button>
        Kattints ide a továbblépéshez!
    </button>
</x-app-layout>