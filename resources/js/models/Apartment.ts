export default class Apartment {
  private name: string;
  private bedrooms: number;
  private bathrooms: number;
  private storeys: number;
  private garages: number;
  private price: number;

  constructor(name, bedrooms, bathrooms, storeys, garages, price) {
    this.name = name;
    this.bedrooms = bedrooms;
    this.bathrooms = bathrooms;
    this.storeys = storeys;
    this.garages = garages;
    this.price = price;
  }

  public get Name() {
    return this.name
  }

  public get Bedrooms() {
    return this.bedrooms
  }

  public get Bathrooms() {
    return this.bathrooms
  }

  public get Storeys() {
    return this.storeys
  }

  public get Garages() {
    return this.garages
  }

  public get Price() {
    return this.price
  }
}
