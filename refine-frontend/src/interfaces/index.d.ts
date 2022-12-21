export interface ICategory {
  id: number;
  title: string;
}
export interface IPost {
  id: number;
  title: string;
  content: string;
  status: "published" | "draft" | "rejected";
  createdAt: string;
  category: { id: number };
}

//Vehicles   
export interface IVehicle {
  id: number;
  created_at: Date;
  updated_at: Date;
  type_id: number;
  brand_id: number;
  wheels: number;
  model: string;
  patent: string;
  chassis: string;
  km_traveled: number;
  type: IVType;
  brand: IVBrand;
}

export interface IVBrand {
  id: number;
  created_at: Date;
  updated_at: Date;
  brand?: string; 
}

// vechiles types
export interface IVType {
  id: number;
  created_at: Date;
  updated_at: Date;
  type: string;
}
