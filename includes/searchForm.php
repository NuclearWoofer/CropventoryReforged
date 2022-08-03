

  <h2>Search Crops</h2>
  <form method="post">
      <input type="hidden" name="action" value="search" />
      <label>Search by Field:</label>
       <select name="fieldName">
              <option value=""> -- Select One --</option>
              <option value="cropName">Crop Name</option>
              <option value="cropPlanted">Seed Sown Date</option>
              
          </select>
       <input type="text" name="fieldValue" value= "<?= $fieldValue ?>">
      <button type="submit" name="searchCrops">Search</button>
      
  </form>