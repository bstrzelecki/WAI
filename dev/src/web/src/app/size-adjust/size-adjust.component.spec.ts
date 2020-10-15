import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SizeAdjustComponent } from './size-adjust.component';

describe('SizeAdjustComponent', () => {
  let component: SizeAdjustComponent;
  let fixture: ComponentFixture<SizeAdjustComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SizeAdjustComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SizeAdjustComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
