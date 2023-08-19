import random

# Sample company data (for demonstration purposes)
companies = [
    {"name": "TechCo", "category": "green", "location": "City A"},
    {"name": "InnoCorp", "category": "orange", "location": "City B"},
    {"name": "SoftSys", "category": "red", "location": "City C"},
]

# Sample resumes (for demonstration purposes)
resumes = [
    {"name": "Alice", "skills": ["Python", "Machine Learning"], "identity": "woman"},
    {"name": "Sam", "skills": ["Java", "Data Analysis"], "identity": "queer"},
    {"name": "Chris", "skills": ["C++", "Algorithms"], "identity": "man"},
]

# AI Recommendation system (simplified)
class AIRecommendationSystem:
    def recommend_companies(self, category, location):
        matches = []
        for company in companies:
            if company["category"] == category and company["location"] == location:
                matches.append(company)
        return matches
    
    def recommend_resumes(self, job_skills, identity_preference):
        matches = []
        for resume in resumes:
            if any(skill in job_skills for skill in resume["skills"]) and resume["identity"] == identity_preference:
                matches.append(resume)
        return matches

# User interface (simplified)
def main():
    ai_system = AIRecommendationSystem()
    
    while True:
        print("1. Find Companies to Work For")
        print("2. Find Resumes for Recruitment")
        print("3. Exit")
        
        choice = input("Enter your choice: ")
        
        if choice == "1":
            category = input("Enter your preferred category (green, orange, red): ")
            location = input("Enter your preferred location: ")
            recommended_companies = ai_system.recommend_companies(category, location)
            print("Recommended Companies:", recommended_companies)
        
        elif choice == "2":
            job_skills = input("Enter required job skills (comma-separated): ").split(",")
            identity_preference = input("Enter preferred identity (woman, queer, etc.): ")
            recommended_resumes = ai_system.recommend_resumes(job_skills, identity_preference)
            print("Recommended Resumes:", recommended_resumes)
        
        elif choice == "3":
            print("Exiting. Goodbye!")
            break
        
        else:
            print("Invalid choice. Please select a valid option.")

if __name__ == "__main__":
    main()
